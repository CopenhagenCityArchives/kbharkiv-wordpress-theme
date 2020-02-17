wp.domReady( () => {
	wp.blocks.unregisterBlockStyle( 'core/button', 'default' );
	wp.blocks.unregisterBlockStyle( 'core/button', 'outline' );
	wp.blocks.unregisterBlockStyle( 'core/button', 'squared' );

	wp.blocks.registerBlockStyle( 'core/button', {
		name: 'btn',
		label: 'Knap',
		isDefault: true,
	});
} );
