<?php

class QodeFrameworkFieldNavMenuCheckbox extends QodeFrameworkFieldNavMenuType {
	
	function __construct( $params ) {
		parent::__construct( $params );
	}
	
	public function render() {
		?>
		<p class="description description-wide <?php echo esc_attr( $this->params['class'] ) ?>">
			<label for="<?php echo esc_attr( $this->params['id'] ); ?>"><?php echo esc_html( $this->title ); ?><br/>
				<?php foreach ( $this->options as $key => $label ) : ?>
					<?php if ( $label !== '' ) {
						$checked = is_array( $this->params['value'] ) && in_array( $key, $this->params['value'] ) ? 'checked' : '';
						$id      = esc_attr( $this->params['id'] );
						?>
						<input <?php echo esc_attr( $checked ); ?> type="checkbox" id="<?php echo esc_attr( $id ); ?>" value="<?php echo esc_attr( $key ); ?>" name="<?php echo esc_attr( $this->params['field_name'] . '[]' ); ?>" /><?php echo esc_html( $label ); ?>
						<?php
					}
				endforeach; ?>
				<span class="description"><?php echo esc_html( $this->description ); ?></span>
			</label>
		</p>
		<?php
	}
}