jQuery(function(){
	jQuery('#user_pw').hide();
	jQuery('#cancel').hide();
	jQuery('#hide').hide();
	jQuery('#show').hide();
	
	jQuery('#makepw').click(function()
	{
		jQuery('#user_pw').show();
		jQuery('#makepw').hide();
		jQuery('#cancel').show();
		jQuery('#hide').show();	
	});

	jQuery('#cancel').click(function()
	{
		jQuery('#user_pw').hide();
		jQuery('#cancel').hide();
		jQuery('#makepw').show();	
		jQuery('#hide').hide();
		jQuery('#show').hide();
	});

	jQuery('#hide').click(function()
	{
		jQuery('#user_pw').get(0).type = 'password';
		jQuery('#user_pw').show();
		jQuery('#hide').hide();
		jQuery('#show').show();
	});

	jQuery('#show').click(function()
	{
		jQuery('#user_pw').get(0).type = 'text';
		jQuery('#user_pw').show();
		jQuery('#hide').show();
		jQuery('#show').hide();
	});
});