$(document).ready(function(){
	var domain ="http://"+document.domain;

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
	
	// var contacts = new Bloodhound({
	// 	datumTokenizer: Bloodhound.tokenizers.obj.whitespace('value'),
	// 	queryTokenizer: Bloodhound.tokenizers.whitespace,
	// 	remote: '/../api/v1/contacts/%QUERY'
	// });
	 
	// contacts.initialize();
	 
	// $('.typeahead').typeahead(null, {
	// 	name: 'fullname',
	// 	displayKey: 'first_name',
	// 	source: contacts.ttAdapter(),
	// 	templates: {
	// 		suggestion: Handlebars.compile([
	// 		'<p class="repo-language">{{title}}</p>',
	// 		'<p class="repo-name">{{first_name}}</p>',
	// 		'<p class="repo-description">{{company_name}}</p>'
	// 		].join(''))
	// 	} 
	// });
//--------------------------------------------------------
	// add contact to project
	$(".add-contact-sidebar").click(function(){
		var group = $(this).siblings().text();
		$('#add-contact #myModalLabel').text("Tag contact to '" + group + "' group.");
		$('#add-contact #group_id').val($(this).attr('id'));
		$('#add-contact').modal('show');
		return false;
	});

	$('#add-contact').on('hide.bs.modal', function (e) {
		$(':input','#add-contact')
		  .not(':button, :submit, :reset, :hidden')
		  .val('')
		  .removeAttr('checked')
		  .removeAttr('selected');
	})

	$("#add-contact input#submit").click(function(){
		$.ajax({
			type: "POST",
			headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') },
			url: domain +"/api/v1/addcontact/" + $('#add-contact #group_id').val(), 
			data: $('form.project-contact').serialize(),
			success: function(msg){
				$("#add-contact").modal('hide'); //hide popup 
				location.reload();
			},
			error: function(){
				alert("failure");
			}
		});
	});

	function formatSelection(contact) {
		var markup = '<div style="padding: 5px; overflow:hidden;">';
			markup += '<div style="float: left; margin-left: 5px">';
			markup += '<div style="padding-bottom: 4px; font-weight: bold; font-size: 14px; line-height: 14px">'+contact.text+'</div>';
			markup += '<div style=" font-size: 12px">'+contact.company+'</div>';
			markup += '</div>';
			markup += '</div>';
			markup += '<div style="clear:both;"></div>';
			markup += '</div>';
		return markup;
	}

	$("#select-contact").select2({
		placeholder: "Search for a contact",
		allowClear: true,
		minimumInputLength: 3,
		ajax: { // instead of writing the function to execute the request we use Select2's convenient helper
			url: domain +"/api/v1/mycontacts", 
			dataType: 'json',
			data: function (term, page) {
				return {
					q: term, // search term
					page_limit: 10,
				};
			},
			results: function (data, page) { // parse the results into the format expected by Select2.
				//console.log(data);
				// since we are using custom formatting functions we do not need to alter remote JSON data
				return {results: data.contacts};
			}
		},
		formatResult: formatSelection,
		escapeMarkup: function(m) { return m; }
	});
//-------------------------------------------------------------------
	// process tagged contacts
	if($('#tagged-contacts').length){
		
	}
});