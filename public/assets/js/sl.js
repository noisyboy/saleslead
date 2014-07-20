$(document).ready(function(){
	//add new fields for phone
	$('#add-phone').click(function(e){
		var phone_group = $(this).closest('.form-group').clone();
		phone_group.children('label').find('a').attr('class', 'btn btn-danger remove-phone');
		phone_group.children('label').find('a span').attr('class', 'glyphicon glyphicon-minus');
		phone_group.children().find('input[type=text]').val('');
		phone_group.appendTo('#phone-wrapper');
		return false;
	});

	//remove phone
	$('body').on('click','.remove-phone', function(e){
		$(this).closest('.form-group').remove();
		return false;
	});
//--------------------------------------------------------
	//add new fields for email
	$('#add-email').click(function(e){
		var email_group = $(this).closest('.form-group').clone();
		email_group.children('label').find('a').attr('class', 'btn btn-danger remove-email');
		email_group.children('label').find('a span').attr('class', 'glyphicon glyphicon-minus');
		email_group.children().find('input[type=text]').val('');

		var last_input = parseInt($('#email-wrapper .form-group:last-child').clone().find('input[type=text]').attr('name').match(/\d+/g));
		var new_number = last_input+1;
		email_group.children().find('input[type=text]').attr('name', 'email['+new_number+']');
		email_group.appendTo('#email-wrapper');
		return false;
	});

	//remove email
	$('body').on('click','.remove-email', function(e){
		$(this).closest('.form-group').remove();
		return false;
	});
//--------------------------------------------------------
	// contact
	$("#phone-modal input#submit").click(function(){
		$.ajax({
			type: "POST",
			url: "../phones", 
			data: $('form.contact-phone').serialize(),
			success: function(msg){
				$("#phone-modal").modal('hide'); //hide popup 
				location.reload();
			},
			error: function(){
				alert("failure");
			}
		});
	});

	$("#email-modal input#submit").click(function(){
		$.ajax({
			type: "POST",
			url: "../emails", 
			data: $('form.contact-email').serialize() + "&id=" + morevalue,
			success: function(msg){
				$("#email-modal").modal('hide'); //hide popup 
				location.reload();
			},
			error: function(){
				alert("failure");
			}
		});
	});
//--------------------------------------------------------
	// new project
	$('#area-select select#area_id').select_chain('#region-select select#region_id','/api/v1/area_regions/','SELECT REGION','regions');
	$('#category-select select#project_category_id').select_chain('#subcategory-select select#project_sub_category_id','/api/v1/sub_categories/','SELECT SUB CATEGORY','subcategories');

	// typeahead auto complete for adding contact
	
	var contacts = new Bloodhound({
		datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
		queryTokenizer: Bloodhound.tokenizers.whitespace,
		remote: '../api/v1/contacts/%QUERY'
	});
	 
	contacts.initialize();
	 
	$('.typeahead').typeahead(null, {
		name: 'fullname',
		displayKey: 'first_name',
		source: contacts.ttAdapter(),
		templates: {
			suggestion: Handlebars.compile([
			'<p class="repo-language">{{title}}</p>',
			'<p class="repo-name">{{first_name}}</p>',
			'<p class="repo-description">{{company_name}}</p>'
			].join(''))
		} 
	});
});