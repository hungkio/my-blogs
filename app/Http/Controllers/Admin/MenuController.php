<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\MenuDataTable;
use App\Domain\Menu\Models\Menu;
use App\Domain\Menu\Models\MenuItem;
use App\Domain\Page\Models\Page;
use App\Domain\Post\Models\Post;
use App\Domain\Taxonomy\Models\Taxon;
use App\Http\Requests\Admin\CreateMenuRequest;
use App\Http\Requests\Admin\MenuBulkDeleteRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MenuController
{
    use AuthorizesRequests;

    public function index(MenuDataTable $dataTable)
    {
        $this->authorize('view', Menu::class);

        return $dataTable->render('admin.menus.index');
    }

    public function edit(Menu $menu)
    {
        $this->authorize('update', $menu);

        $taxons = Taxon::whereTaxonomyId(setting('post_taxonomy', 1))->get();

        return view('admin.menus.edit', compact('menu', 'taxons'));
    }

    public function store(CreateMenuRequest $request)
    {
        $this->authorize('create', Menu::class);

        DB::transaction(function () use ($request) {
            try{
                $menu = [
                    'name' => $request->name,
                    'status' => Menu::STATUS_SHOW
                ];
                $menu_db = Menu::create($menu);
                $menu_item = MenuItem::create(array_merge($menu, [
                    'menu_id' => $menu_db->id,
                    'type' => 0,
                ]));

                logActivity($menu_db, 'create');
                logActivity($menu_item, 'create');
                flash()->success(__('Menu ":model" đã được tạo thành công !', ['model' => $menu_db->name]));
            } catch (\Exception $e) {
                return back()->withErrors(['error' => $e->getMessage()]);
            }
        });
        return back();
    }

    public function update(CreateMenuRequest $request, Menu $menu)
    {
        DB::transaction(function () use ($request, $menu) {
            try{
                $menu->update($request->only('name'));
                $menu->rootMenuItem()->update([
                    'name' => $request->name
                ]);
                logActivity($menu, 'update');
                logActivity($menu->rootMenuItem()->first(), 'update');
                flash()->success(__('Menu ":model" đã được cập nhật thành công !', ['model' => $menu->name]));
            } catch (\Exception $e) {
                return back()->withErrors(['error' => $e->getMessage()]);
            }
        });
        return back();
    }

    public function getDataCreate(Request $request)
    {
        $type = $request->type;
        if ($type) {
            if ($type == MenuItem::TYPE_PAGE) {
                $data = Page::select('id', 'title')->paginate();
            }
            if ($type == MenuItem::TYPE_CATEGORY) {
                $data = Taxon::whereTaxonomyId(setting('post_taxonomy', 1))->paginate();
                foreach ($data as &$taxon) {
                    $taxon->name = $taxon->selectText();
                }
            }
            if ($type == MenuItem::TYPE_POST) {
                $data = Post::select('id', 'title')->paginate();
            }
        }
        return response()->json([
            'status' => true,
            'data' => @$data->getCollection()
        ]);
    }

    public function getDataUpdate(Request $request)
    {
        $menuItemId = $request->menu_item_id;
        if ($menuItemId) {
            $menuItem = MenuItem::findOrFail($menuItemId);
            $type = $menuItem->type;
            if ($type == MenuItem::TYPE_PAGE) {
                $data = Page::select('id', 'title')->paginate();
                $data = $data->getCollection();
            }
            if ($type == MenuItem::TYPE_CATEGORY) {
                $data = Taxon::whereTaxonomyId(setting('post_taxonomy', 1))->paginate();
                foreach ($data as &$taxon) {
                    $taxon->name = $taxon->selectText();
                }
                $data = $data->getCollection();
            }
            if ($type == MenuItem::TYPE_POST) {
                $data = Post::select('id', 'title')->paginate();
                $data = $data->getCollection();
            }
            if ($type == MenuItem::TYPE_LINK) {
                $data = '<input type="text" name="item_content" value="' . $menuItem->item_content . '" id="item_content" placeholder="Nội dung" class="form-control ">';
            }
        }
        return response()->json([
            'status' => true,
            'data' => @$data,
            'menuItem' => @$menuItem,
        ]);
    }

    public function changeStatus(Menu $menu, Request $request)
    {
        $menu->update(['status' => $request->status]);
        logActivity($menu, 'update');
        return response()->json([
            'status' => true,
            'message' => __('Menu đã được cập nhật trạng thái thành công !'),
        ]);
    }

    public function bulkStatus(Request $request)
    {
        $menus = Menu::whereIn('id', $request->id)->get();
        foreach ($menus as $menu) {
            $menu->update(['status' => $request->status]);
            logActivity($menu, 'update');
        }

        return response()->json([
            'status' => true,
            'message' => __(':count menu đã được cập nhật trạng thái thành công !', ['count' => $menus->count()]),
        ]);
    }

    public function tree(Menu $menu)
    {
        $rootMenuItem = $menu->rootMenuItem;
        return response()->json([
            ['id' => @$rootMenuItem->id, 'text' => @$rootMenuItem->name, 'children' => true],
        ]);
    }

    public function destroy(Menu $menu)
    {
        $this->authorize('delete', $menu);
        $menu_name = $menu->name;

        $array_menu_settings = array(setting('menu_header', 0), setting('menu_footer_1', 0), setting('menu_footer_2', 0));

        if (in_array($menu->id, $array_menu_settings)) {
            return response()->json([
                'status' => 'error',
                'message' => __('Menu đang được sử dụng. Không thể xóa!')
            ]);
        }

        logActivity($menu, 'delete'); // log activity

        $menu->menus()->delete();
        $menu->delete();

        return response()->json([
            'status' => true,
            'message' => __('Menu ":model" đã xóa thành công !', ['model' => $menu_name])
        ]);
    }

    public function bulkDelete(MenuBulkDeleteRequest $request)
    {
        $ids = [];
        $array_menu_settings = array(setting('menu_header', 0), setting('menu_footer_1', 0), setting('menu_footer_2', 0));

        foreach ($request->input('id') as $id) {

            if (!in_array($id, $array_menu_settings)) {
                $ids[] = $id;
            }
        }
        $menus = Menu::whereIn('id', $ids)->get();
        $deletedRecord = $menus->count();
        foreach ($menus as $menu) {
            logActivity($menu, 'delete'); // log activity
            $menu->menus()->delete();
            $menu->delete();
        }

        return response()->json([
            'status' => true,
            'message' => __('Đã xóa ":count" loại menu thành công và ":count_fail" loại menu đang được sử dụng, không thể xoá!',
                [
                    'count' => $deletedRecord,
                    'count_fail' => count($request->input('id')) - $deletedRecord,
                ]),
        ]);
    }

    public function searchData(Request $request)
    {
        if ($request->menu_type == MenuItem::TYPE_PAGE) {
            $data = Page::where('title', 'LIKE', $request->query('q').'%')->paginate();
            $data->getCollection()->transform(function ($personal) {
                $result = [
                    'id' => @$personal->id,
                ];
                $result['pretty_name'] = @$personal->title;
                return $result;
            });
        }
        if ($request->menu_type == MenuItem::TYPE_CATEGORY) {
            $data = Taxon::where('name', 'LIKE', $request->query('q').'%')->paginate();
            $data->getCollection()->transform(function ($personal) {
                $result = [
                    'id' => @$personal->id,
                ];
                $result['pretty_name'] = @$personal->selectText();
                return $result;
            });
        }
        if ($request->menu_type == MenuItem::TYPE_POST) {
            $data = Post::where('title', 'LIKE', $request->query('q').'%')->paginate();
            $data->getCollection()->transform(function ($personal) {
                $result = [
                    'id' => @$personal->id,
                ];
                $result['pretty_name'] = @$personal->title;
                return $result;
            });
        }

        return response()->json(@$data);
    }
}
