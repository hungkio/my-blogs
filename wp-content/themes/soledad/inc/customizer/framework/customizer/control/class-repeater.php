<?php
/**
 * Customizer Control: repeater.
 *
 * @author PenciDesign
 * @since 1.0.0
 * @package soledad
 */

namespace SoledadFW\Customizer\Control;

/**
 * Repeater control
 */
class Repeater extends Control_Abstract {

	/**
	 * The control type.
	 *
	 * @access public
	 * @var string
	 */
	public $type = 'soledad-fw-repeater';

	/**
	 * The fields that each container row will contain.
	 *
	 * @access public
	 * @var array
	 */
	public $fields = array();

	/**
	 * Will store a filtered version of value for advenced fields (like images).
	 *
	 * @access protected
	 * @var array
	 */
	protected $filtered_value = array();

	/**
	 * The row label
	 *
	 * @access public
	 * @var array
	 */
	public $row_label = array();

	/**
	 * Constructor.
	 * Supplied `$args` override class property defaults.
	 * If `$args['settings']` is not defined, use the $id as the setting ID.
	 *
	 * @param WP_Customize_Manager $manager Customizer bootstrap instance.
	 * @param string               $id      Control ID.
	 * @param array                $args    {@see WP_Customize_Control::__construct}.
	 */
	public function __construct( $manager, $id, $args = array() ) {

		parent::__construct( $manager, $id, $args );

		// Set up defaults for row labels.
		$this->row_label = array(
			'type' => 'text',
			'value' => esc_attr__( 'row', 'soledad' ),
			'field' => false,
		);

		// Validating args for row labels.
		if ( isset( $args['row_label'] ) && is_array( $args['row_label'] ) && ! empty( $args['row_label'] ) ) {

			// Validating row label type.
			if ( isset( $args['row_label']['type'] ) && ( 'text' === $args['row_label']['type'] || 'field' === $args['row_label']['type'] ) ) {
				$this->row_label['type'] = $args['row_label']['type'];
			}

			// Validating row label type.
			if ( isset( $args['row_label']['value'] ) && ! empty( $args['row_label']['value'] ) ) {
				$this->row_label['value'] = esc_attr( $args['row_label']['value'] );
			}

			// Validating row label field.
			if ( isset( $args['row_label']['field'] ) && ! empty( $args['row_label']['field'] ) && isset( $args['fields'][ esc_attr( $args['row_label']['field'] ) ] ) ) {
				$this->row_label['field'] = esc_attr( $args['row_label']['field'] );
			} else {

				// If from field is not set correctly, making sure standard is set as the type.
				$this->row_label['type'] = 'text';
			}
		}

		if ( empty( $this->button_label ) ) {
			$this->button_label = esc_attr__( 'Add new', 'soledad' ) . ' ' . $this->row_label['value'];
		}

		if ( empty( $args['fields'] ) || ! is_array( $args['fields'] ) ) {
			$args['fields'] = array();
		}

		// An array to store keys of fields that need to be filtered.
		$media_fields_to_filter = array();

		foreach ( $args['fields'] as $key => $value ) {
			if ( ! isset( $value['default'] ) ) {
				$args['fields'][ $key ]['default'] = '';
			}

			if ( ! isset( $value['label'] ) ) {
				$args['fields'][ $key ]['label'] = '';
			}
			$args['fields'][ $key ]['id'] = $key;

			// We check if the filed is an uploaded media ( image , file, video, etc.. ).
			if ( isset( $value['type'] ) && ( 'image' === $value['type'] || 'cropped_image' === $value['type'] || 'upload' === $value['type'] ) ) {

				// We add it to the list of fields that need some extra filtering/processing.
				$media_fields_to_filter[ $key ] = true;
			}

			// If the field is a dropdown-pages field then add it to args.
			if ( isset( $value['type'] ) && ( 'dropdown-pages' === $value['type'] ) ) {

				$dropdown = wp_dropdown_pages(
					array(
						'name'              => '',
						'echo'              => 0,
						'show_option_none'  => esc_attr__( 'Select a Page', 'soledad' ),
						'option_none_value' => '0',
						'selected'          => '',
					)
				);

				// Hackily add in the data link parameter.
				$dropdown = str_replace( '<select', '<select data-field="'.esc_attr( $args['fields'][ $key ]['id'] ).'"' . $this->get_link(), $dropdown );

				$args['fields'][ $key ]['dropdown'] = $dropdown;
			}
		}

		$this->fields = $args['fields'];

		// Now we are going to filter the fields.
		// First we create a copy of the value that would be used otherwise.
		$this->filtered_value = $this->value();

		if ( is_array( $this->filtered_value ) && ! empty( $this->filtered_value ) ) {

			// We iterate over the list of fields.
			foreach ( $this->filtered_value as &$filtered_value_field ) {

				if ( is_array( $filtered_value_field ) && ! empty( $filtered_value_field ) ) {

					// We iterate over the list of properties for this field.
					foreach ( $filtered_value_field as $key => &$value ) {

						// We check if this field was marked as requiring extra filtering (in this case image, cropped_images, upload).
						if ( array_key_exists( $key, $media_fields_to_filter ) ) {

							// What follows was made this way to preserve backward compatibility.
							// The repeater control use to store the URL for images instead of the attachment ID.
							// We check if the value look like an ID (otherwise it's probably a URL so don't filter it).
							if ( is_numeric( $value ) ) {

								// "sanitize" the value.
								$attachment_id = (int) $value;

								// Try to get the attachment_url.
								$url = wp_get_attachment_url( $attachment_id );

								$filename = basename( get_attached_file( $attachment_id ) );

								// If we got a URL.
								if ( $url ) {

									// 'id' is needed for form hidden value, URL is needed to display the image.
									$value = array(
										'id'  => $attachment_id,
										'url' => $url,
										'filename' => $filename,
									);
								}
							}
						}
					}
				}
			}
		}
	}

	/**
	 * Refresh the parameters passed to the JavaScript via JSON.
	 *
	 * @access public
	 */
	public function to_json() {
		parent::to_json();

		$fields = $this->fields;

		$this->json['fields'] = $fields;
		$this->json['row_label'] = $this->row_label;

		// If filtered_value has been set and is not empty we use it instead of the actual value.
		if ( is_array( $this->filtered_value ) && ! empty( $this->filtered_value ) ) {
			$this->json['value'] = $this->filtered_value;
		}
	}

	/**
	 * Render the control's content.
	 * Allows the content to be overriden without having to rewrite the wrapper in $this->render().
	 *
	 * @access protected
	 */
	protected function render_content() {
		?>
		<label>
			<?php if ( ! empty( $this->label ) ) : ?>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			<?php endif; ?>
			<?php if ( ! empty( $this->description ) ) : ?>
				<span class="description customize-control-description"><?php echo wp_kses( $this->description, wp_kses_allowed_html() ); ?></span>
			<?php endif; ?>
			<input type="hidden" <?php $this->input_attrs(); ?> value="" <?php echo wp_kses_post( $this->get_link() ); ?> />
		</label>

		<ul class="repeater-fields"></ul>

		<?php if ( isset( $this->choices['limit'] ) ) : ?>
			<p class="limit"><?php printf( esc_attr__( 'Limit: %s rows', 'soledad' ), esc_html( $this->choices['limit'] ) ); ?></p>
		<?php endif; ?>
		<div class="repeater-add-wrapper">
        	<button class="button button-large button-primary repeater-add"><i class="fa fa-plus"></i></button>	
        </div>

		<?php

		$this->repeater_js_template();
	}

	/**
	 * An Underscore (JS) template for this control's content (but not its container).
	 * Class variables for this control class are available in the `data` JS object.
	 *
	 * @access public
	 */
	public function repeater_js_template() {
		?>
		<script type="text/html" class="customize-control-repeater-content">
			<# var field; var index = data.index; #>

			<li class="repeater-row minimized" data-row="{{{ index }}}">

				<div class="repeater-row-header">
					<span class="repeater-row-label"></span>
					<i class="dashicons dashicons-arrow-down repeater-minimize"></i>
				</div>
				<div class="repeater-row-content">
					<# _.each( data, function( field, i ) { #>

						<div class="repeater-field repeater-field-{{{ field.type }}}">

							<# if ( 'text' === field.type || 'url' === field.type || 'email' === field.type || 'tel' === field.type || 'date' === field.type ) { #>

								<label>
									<# if ( field.label ) { #>
										<span class="customize-control-title">{{ field.label }}</span>
									<# } #>
									<# if ( field.description ) { #>
										<span class="description customize-control-description">{{ field.description }}</span>
									<# } #>
									<input type="{{field.type}}" name="" value="{{{ field.default }}}" data-field="{{{ field.id }}}">
								</label>

							<# } else if ( 'hidden' === field.type ) { #>

								<input type="hidden" data-field="{{{ field.id }}}" <# if ( field.default ) { #> value="{{{ field.default }}}" <# } #> />

							<# } else if ( 'checkbox' === field.type ) { #>

								<label>
									<input type="checkbox" value="true" data-field="{{{ field.id }}}" <# if ( field.default ) { #> checked="checked" <# } #> /> {{ field.label }}
									<# if ( field.description ) { #>
										{{ field.description }}
									<# } #>
								</label>

							<# } else if ( 'select' === field.type ) { #>

								<label>
									<# if ( field.label ) { #>
										<span class="customize-control-title">{{ field.label }}</span>
									<# } #>
									<# if ( field.description ) { #>
										<span class="description customize-control-description">{{ field.description }}</span>
									<# } #>
									<select data-field="{{{ field.id }}}">
										<# _.each( field.choices, function( choice, i ) { #>
											<option value="{{{ i }}}" <# if ( field.default == i ) { #> selected="selected" <# } #>>{{ choice }}</option>
										<# }); #>
									</select>
								</label>

							<# } else if ( 'dropdown-pages' === field.type ) { #>

								<label>
									<# if ( field.label ) { #>
										<span class="customize-control-title">{{{ data.label }}}</span>
									<# } #>
									<# if ( field.description ) { #>
										<span class="description customize-control-description">{{{ field.description }}}</span>
									<# } #>
									<div class="customize-control-content repeater-dropdown-pages">{{{ field.dropdown }}}</div>
								</label>

							<# } else if ( 'radio' === field.type ) { #>

								<label>
									<# if ( field.label ) { #>
										<span class="customize-control-title">{{ field.label }}</span>
									<# } #>
									<# if ( field.description ) { #>
										<span class="description customize-control-description">{{ field.description }}</span>
									<# } #>

									<# _.each( field.choices, function( choice, i ) { #>
										<label>
											<input type="radio" name="{{{ field.id }}}{{ index }}" data-field="{{{ field.id }}}" value="{{{ i }}}" <# if ( field.default == i ) { #> checked="checked" <# } #>> {{ choice }} <br/>
										</label>
									<# }); #>
								</label>

							<# } else if ( 'radio-image' === field.type ) { #>

								<label>
									<# if ( field.label ) { #>
										<span class="customize-control-title">{{ field.label }}</span>
									<# } #>
									<# if ( field.description ) { #>
										<span class="description customize-control-description">{{ field.description }}</span>
									<# } #>

									<# _.each( field.choices, function( choice, i ) { #>
										<input type="radio" id="{{{ field.id }}}_{{ index }}_{{{ i }}}" name="{{{ field.id }}}{{ index }}" data-field="{{{ field.id }}}" value="{{{ i }}}" <# if ( field.default == i ) { #> checked="checked" <# } #>>
											<label for="{{{ field.id }}}_{{ index }}_{{{ i }}}">
												<img src="{{ choice }}">
											</label>
										</input>
									<# }); #>
								</label>

							<# } else if ( 'color' === field.type ) { #>

								<# var defaultValue = '';
								if ( field.default ) {
									if ( '#' !== field.default.substring( 0, 1 ) ) {
										defaultValue = '#' + field.default;
									} else {
										defaultValue = field.default;
									}
									defaultValue = ' data-default-color=' + defaultValue; // Quotes added automatically.
								} #>
								<label>
									<# if ( field.label ) { #>
										<span class="customize-control-title">{{{ field.label }}}</span>
									<# } #>
									<# if ( field.description ) { #>
										<span class="description customize-control-description">{{{ field.description }}}</span>
									<# } #>
									<input class="color-picker-hex" type="text" maxlength="7" placeholder="<?php echo esc_attr__( 'Hex Value', 'soledad' ); ?>"  value="{{{ field.default }}}" data-field="{{{ field.id }}}" {{ defaultValue }} />

								</label>

							<# } else if ( 'textarea' === field.type ) { #>

								<# if ( field.label ) { #>
									<span class="customize-control-title">{{ field.label }}</span>
								<# } #>
								<# if ( field.description ) { #>
									<span class="description customize-control-description">{{ field.description }}</span>
								<# } #>
								<textarea rows="5" data-field="{{{ field.id }}}">{{ field.default }}</textarea>

							<# } else if ( field.type === 'image' || field.type === 'cropped_image' ) { #>

								<label>
									<# if ( field.label ) { #>
										<span class="customize-control-title">{{ field.label }}</span>
									<# } #>
									<# if ( field.description ) { #>
										<span class="description customize-control-description">{{ field.description }}</span>
									<# } #>
								</label>

								<figure class="soledad-fw-image-attachment" data-placeholder="<?php echo esc_attr__( 'No Image Selected', 'soledad' ); ?>" >
									<# if ( field.default ) { #>
										<# var defaultImageURL = ( field.default.url ) ? field.default.url : field.default; #>
										<img src="{{{ defaultImageURL }}}">
									<# } else { #>
										<?php echo esc_attr__( 'No Image Selected', 'soledad' ); ?>
									<# } #>
								</figure>

								<div class="actions">
									<button type="button" class="button remove-button<# if ( ! field.default ) { #> hidden<# } #>"><?php echo esc_attr__( 'Remove', 'soledad' ); ?></button>
									<button type="button" class="button upload-button" data-label=" <?php echo esc_attr__( 'Add Image', 'soledad' ); ?>" data-alt-label="<?php echo esc_attr__( 'Change Image', 'soledad' ); ?>" >
										<# if ( field.default ) { #>
											<?php echo esc_attr__( 'Change Image', 'soledad' ); ?>
										<# } else { #>
											<?php echo esc_attr__( 'Add Image', 'soledad' ); ?>
										<# } #>
									</button>
									<# if ( field.default.id ) { #>
										<input type="hidden" class="hidden-field" value="{{{ field.default.id }}}" data-field="{{{ field.id }}}" >
									<# } else { #>
										<input type="hidden" class="hidden-field" value="{{{ field.default }}}" data-field="{{{ field.id }}}" >
									<# } #>
								</div>

							<# } else if ( field.type === 'upload' ) { #>

								<label>
									<# if ( field.label ) { #>
										<span class="customize-control-title">{{ field.label }}</span>
									<# } #>
									<# if ( field.description ) { #>
										<span class="description customize-control-description">{{ field.description }}</span>
									<# } #>
								</label>

								<figure class="soledad-fw-file-attachment" data-placeholder="<?php echo esc_attr__( 'No File Selected', 'soledad' ); ?>" >
									<# if ( field.default ) { #>
										<# var defaultFilename = ( field.default.filename ) ? field.default.filename : field.default; #>
										<span class="file"><span class="dashicons dashicons-media-default"></span> {{ defaultFilename }}</span>
									<# } else { #>
										<?php echo esc_attr__( 'No File Selected', 'soledad' ); ?>
									<# } #>
								</figure>

								<div class="actions">
									<button type="button" class="button remove-button<# if ( ! field.default ) { #> hidden<# } #>"><?php echo esc_attr__( 'Remove', 'soledad' ); ?></button>
									<button type="button" class="button upload-button" data-label="<?php echo esc_attr__( 'Add File', 'soledad' ); ?>" data-alt-label="<?php echo esc_attr__( 'Change File', 'soledad' ); ?>" >
										<# if ( field.default ) { #>
											<?php echo esc_attr__( 'Change File', 'soledad' ); ?>
										<# } else { #>
											<?php echo esc_attr__( 'Add File', 'soledad' ); ?>
										<# } #>
									</button>
									<# if ( field.default.id ) { #>
										<input type="hidden" class="hidden-field" value="{{{ field.default.id }}}" data-field="{{{ field.id }}}" >
									<# } else { #>
										<input type="hidden" class="hidden-field" value="{{{ field.default }}}" data-field="{{{ field.id }}}" >
									<# } #>
								</div>

							<# } #>

						</div>
					<# }); #>
					<button type="button" class="button-link repeater-row-remove"><?php echo esc_attr__( 'delete', 'soledad' ); ?></button>
				</div>
			</li>
		</script>
		<?php
	}
}
