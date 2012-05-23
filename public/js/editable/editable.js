var editable = {

	init: function(){


		// show cp to dock side of the site top left
		editable.cp.show();

		$('.editable_trig_edit').click(function(e){
			e.preventDefault();

			// make it editable
			var editable_id = $(this).parent().parent().parent().attr('id');
			$('#'+editable_id + ' .editable_content').attr('contentEditable','true');

			// save original state for cancel event
			var content = $('#'+editable_id + ' .editable_content').html();
			$('#'+editable_id).data('original', content);

			// show state 2
			$('#'+editable_id+' .editable_state').hide();
			$('#'+editable_id+' .editable_state_2').show();

		});

		$('.editable_trig_save').click(function(e){
			e.preventDefault();

			// make it not editable
			var editable_id = $(this).parent().parent().parent().attr('id');
			var editable_type = $(this).parent().parent().parent().attr('rel');
			$('#'+editable_id + ' .editable_content').attr('contentEditable','false');

			var content = $('#'+editable_id + ' .editable_content').html();
			var name = editable_id.split('editable_')[1];
			var post = {content: content, name: name, type: editable_type};
			$.post("/editable/save", post, function(res){
				if(res.status.code == 200){
					// show state 1
					$('#'+editable_id + ' .editable_state').hide();
					$('#'+editable_id + ' .editable_state_1').show();
				}else{
					alert('Error');
				}
			});
		});

		$('.editable_trig_cancel').click(function(e){
			e.preventDefault();

			// make it not editable
			var editable_id = $(this).parent().parent().parent().attr('id');
			$('#'+editable_id + ' .editable_content').attr('contentEditable','false');

			var content = $('#'+editable_id).data('original');
			$('#'+editable_id + ' .editable_content').html(content);

			// show state 1
			$('#'+editable_id + ' .editable_state').hide();
			$('#'+editable_id + ' .editable_state_1').show();
		});

	},

	cp: {
		show: function(){
			var html  = "<div id='editable_cp'>";
				html += "	<h3>Change background</h3>";
				html += "	<div>";
				html += "		<img src='http://livepreview.webglogic.com/cleancreative/light/color_picker/images/pattern_cells.jpg'>";
				html += "		<img src='http://livepreview.webglogic.com/cleancreative/light/color_picker/images/pattern_cells_big.jpg'>";
				html += "		<img src='http://livepreview.webglogic.com/cleancreative/light/color_picker/images/pattern_diagonal_wide.jpg'>";
				html += "		<img src='http://livepreview.webglogic.com/cleancreative/light/color_picker/images/pattern_diagonal_wide.jpg'>";
				html += "	</div>";
				html += "	<div>";
				html += "		<img src='http://livepreview.webglogic.com/cleancreative/light/color_picker/images/pattern_cells.jpg'>";
				html += "		<img src='http://livepreview.webglogic.com/cleancreative/light/color_picker/images/pattern_cells_big.jpg'>";
				html += "		<img src='http://livepreview.webglogic.com/cleancreative/light/color_picker/images/pattern_diagonal_wide.jpg'>";
				html += "		<img src='http://livepreview.webglogic.com/cleancreative/light/color_picker/images/pattern_diagonal_wide.jpg'>";
				html += "	</div>";
				html += "	<div>";
				html += "		<img src='http://livepreview.webglogic.com/cleancreative/light/color_picker/images/pattern_cells.jpg'>";
				html += "		<img src='http://livepreview.webglogic.com/cleancreative/light/color_picker/images/pattern_cells_big.jpg'>";
				html += "		<img src='http://livepreview.webglogic.com/cleancreative/light/color_picker/images/pattern_diagonal_wide.jpg'>";
				html += "		<img src='http://livepreview.webglogic.com/cleancreative/light/color_picker/images/pattern_diagonal_wide.jpg'>";
				html += "	</div>";
				html += "</div>"

			$(html).appendTo(document.body).css({position: 'fixed', top: '200px', left: '0'});

			$("#editable_cp").beResetCSS();
			$(".editable").beResetCSS();
		}
	}

}