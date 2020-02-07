<?php
class QodeFrameworkFieldTextAreaHTML extends QodeFrameworkFieldType {

    public function render_field() { ?>
	    <textarea class="form-control qodef-field qodef--field-html" name="<?php echo esc_attr( $this->name ); ?>" rows="10"><?php
		    echo wp_kses( $this->params['value'], array(
			    'svg'   => array(
				    'class'           => true,
				    'aria-hidden'     => true,
				    'aria-labelledby' => true,
				    'role'            => true,
				    'xmlns'           => true,
				    'width'           => true,
				    'height'          => true,
				    'viewbox'         => true,
			    ),
			    'g'     => array(
				    'fill' => true
			    ),
			    'title' => array(
				    'title' => true
			    ),
			    'path'  => array(
				    'd'    => true,
				    'fill' => true,
			    ),
		    ) );
	    ?></textarea>
    <?php
    }
}