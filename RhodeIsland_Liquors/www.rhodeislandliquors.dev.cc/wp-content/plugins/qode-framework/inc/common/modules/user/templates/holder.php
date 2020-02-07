<?php
foreach ( $this_object->get_child_elements() as $key => $child ) {
	foreach ($roles as $role) {
		if ( in_array( $role, $child->get_scope() ) ) {
			$child->render();
			break;
		}
	}
}