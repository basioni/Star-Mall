/**
 * @package 	WordPress Plugin
 * @subpackage 	CMSMasters Content Composer
 * @version		1.5.1
 * 
 * Visual Content Composer Schortcodes
 * Created by CMSMasters
 * 
 */


// CMSMasters Custom Shortcodes
var cmsmastersShortcodes = { 
	// Text Block
	cmsmasters_text : { 
		title : 	cmsmasters_shortcodes.text_title, 
		icon : 		'admin-icon-text', 
		pair : 		true, 
		content : 	'content', 
		visual : 	'<div>{{ data.content }}</div>', 
		multiple : 	false, 
		def : 		'<p>' + cmsmasters_shortcodes.def_text + '</p>', 
		fields : { 
			// Content
			content : { 
				type : 		'editor', 
				title : 	cmsmasters_shortcodes.content, 
				descr : 	'', 
				def : 		'<p>' + cmsmasters_shortcodes.def_text + '</p>', 
				required : 	true, 
				width : 	'full' 
			}, 
			// CSS3 Animation
			animation : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.animation_title, 
				descr : 	cmsmasters_shortcodes.animation_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.animation_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	get_animations() 
			}, 
			// Animation Delay
			animation_delay : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.animation_delay_title, 
				descr : 	cmsmasters_shortcodes.animation_delay_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.animation_delay_descr_note + "</span>", 
				def : 		'0', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				step : 		'50' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.classes_title, 
				descr : 	cmsmasters_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	}, 
	
	
	// Heading
	cmsmasters_heading : { 
		title : 	cmsmasters_shortcodes.heading_title, 
		icon : 		'admin-icon-heading', 
		pair : 		true, 
		content : 	'content', 
		visual : 	'<{{ data.type }} class="{{ data.icon }}">{{ data.content }}</{{ data.type }}>', 
		multiple : 	false, 
		def : 		cmsmasters_shortcodes.heading_title, 
		fields : { 
			// Heading Text
			content : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.heading_field_content_title, 
				descr : 	'', 
				def : 		cmsmasters_shortcodes.heading_title, 
				required : 	true, 
				width : 	'half' 
			}, 
			// Heading Type
			type : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.heading_field_type_title, 
				descr : 	'', 
				def : 		'h1', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'h1' : 	'H1', 
							'h2' : 	'H2', 
							'h3' : 	'H3', 
							'h4' : 	'H4', 
							'h5' : 	'H5', 
							'h6' : 	'H6' 
				} 
			}, 
			
			// Google Font
			font_family : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.heading_field_font_title, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	cmsmasters_composer_fonts() 
			}, 
			// Font Size
			font_size : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.heading_field_font_size_title, 
				descr : 	"<span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.size_zero_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'number', 
				min : 		'0' 
			}, 
			// Line Height
			line_height : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.heading_field_line_height_title, 
				descr : 	"<span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.size_zero_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'number', 
				min : 		'0' 
			}, 
			// Font Weight
			font_weight : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.heading_field_font_weight_title, 
				descr : 	'', 
				def : 		'normal', 
				required : 	false, 
				width : 	'half', 
				choises : 	cmsmasters_composer_font_weight() 
			}, 
			// Font Style
			font_style : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.heading_field_font_style_title, 
				descr : 	'', 
				def : 		'normal', 
				required : 	false, 
				width : 	'half', 
				choises : 	cmsmasters_composer_font_style() 
			}, 
			// Heading Icon
			icon : { 
				type : 		'icon', 
				title : 	cmsmasters_shortcodes.heading_field_icon_title, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	cmsmasters_composer_icons() 
			}, 
			// Text Align
			text_align : { 
				type : 		'radio', 
				title : 	cmsmasters_shortcodes.text_align, 
				descr : 	'', 
				def : 		'left', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'left' : 		cmsmasters_shortcodes.choice_left, 
							'center' : 		cmsmasters_shortcodes.choice_center, 
							'right' : 		cmsmasters_shortcodes.choice_right 
				} 
			}, 
			// Color
			color : { 
				type : 		'rgba', 
				title : 	cmsmasters_shortcodes.heading_field_color_title, 
				descr : 	"<span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.heading_field_color_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Background Color
			bg_color : { 
				type : 		'rgba', 
				title : 	cmsmasters_shortcodes.heading_field_bg_color_title, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Border Radius
			border_radius : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.heading_field_border_radius_title, 
				descr : 	cmsmasters_shortcodes.heading_field_border_radius_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.border_radius_descr_note_1 + " <br />" + cmsmasters_shortcodes.border_radius_descr_note_2 + " <a href=\"http://www.css3generator.in/border-radius.html\" target=\"_blank\">" + cmsmasters_shortcodes.border_radius_descr_note_3 + "</a>. <br />" + cmsmasters_shortcodes.border_radius_descr_note_4 + " <a href=\"http://screencast.com/t/krCXdo0NN\" target=\"_blank\">" + cmsmasters_shortcodes.border_radius_descr_note_5 + "</a>. <br />" + cmsmasters_shortcodes.heading_field_border_radius_descr_note + ".</span>", 
				def : 		'', 
				required : 	false 
			}, 
			// Heading Link
			link : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.heading_field_link_title, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'full' 
			}, 
			// Heading Link Target
			target : { 
				type : 		'radio', 
				title : 	cmsmasters_shortcodes.link_target, 
				descr : 	'', 
				def : 		'self', 
				required : 	false, 
				width : 	'half',  
				choises : { 
							'self' : 	cmsmasters_shortcodes.link_target_choice_self, 
							'blank' : 	cmsmasters_shortcodes.link_target_choice_blank 
				}, 
				depend : 	'link:!' 
			}, 
			// Top Margin
			margin_top : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.top_margin, 
				descr : 	"<span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.size_note + "</span>", 
				def : 		'0', 
				required : 	false, 
				width : 	'number' 
			}, 
			// Bottom Margin
			margin_bottom : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.bottom_margin, 
				descr : 	"<span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.size_note + "</span>", 
				def : 		'20', 
				required : 	false, 
				width : 	'number' 
			}, 
			// Divider
			divider : { 
				type : 		'checkbox', 
				title : 	cmsmasters_shortcodes.divider, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'true' : 	cmsmasters_shortcodes.choice_show 
				} 
			}, 
			// Divider Type
			divider_type : { 
				type : 		'radio', 
				title : 	cmsmasters_shortcodes.divider_length, 
				descr : 	'', 
				def : 		'short', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'short' : 	cmsmasters_shortcodes.choice_short, 
							'medium' : 	cmsmasters_shortcodes.choice_medium, 
							'long' : 	cmsmasters_shortcodes.choice_long 
				}, 
				depend : 	'divider:true' 
			}, 
			// Divider Height
			divider_height : { 
				type : 		'range', 
				title : 	cmsmasters_shortcodes.divider_width, 
				descr : 	"<span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.size_note_pixel + "</span>", 
				def : 		'1', 
				required : 	false, 
				width : 	'number', 
				min : 		'1', 
				max : 		'20', 
				depend : 	'divider:true' 
			}, 
			// Divider Style
			divider_style : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.divider_style, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'solid' : 	cmsmasters_shortcodes.choice_solid, 
							'dotted' : 	cmsmasters_shortcodes.choice_dotted, 
							'dashed' : 	cmsmasters_shortcodes.choice_dashed, 
							'double' : 	cmsmasters_shortcodes.choice_double, 
							'groove' : 	cmsmasters_shortcodes.choice_groove, 
							'ridge' : 	cmsmasters_shortcodes.choice_ridge 
				}, 
				depend : 	'divider:true' 
			}, 
			// Divider Color
			divider_color : { 
				type : 		'rgba', 
				title : 	cmsmasters_shortcodes.heading_field_divider_color_title, 
				descr : 	"<span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.heading_field_divider_color_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				depend : 	'divider:true' 
			}, 
			// CSS3 Animation
			animation : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.animation_title, 
				descr : 	cmsmasters_shortcodes.animation_descr + " <br /><span>" + cmsmasters_shortcodes.note  + ' ' + cmsmasters_shortcodes.animation_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	get_animations() 
			}, 
			// Animation Delay
			animation_delay : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.animation_delay_title, 
				descr : 	cmsmasters_shortcodes.animation_delay_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.animation_delay_descr_note + "</span>", 
				def : 		'0', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				step : 		'50' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.classes_title, 
				descr : 	cmsmasters_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	}, 
	
	
	// Audio
	cmsmasters_audios : { 
		title : 	cmsmasters_shortcodes.audio, 
		icon : 		'admin-icon-audio', 
		pair : 		true, 
		content : 	'audio', 
		visual : 	false, 
		multiple : 	true, 
		def : 		'[cmsmasters_audio]' + cmsmasters_shortcodes.media_def + '[/cmsmasters_audio]', 
		fields : { 
			// Audio
			audio : { 
				type : 		'multiple', 
				title : 	cmsmasters_shortcodes.audio, 
				descr : 	cmsmasters_shortcodes.audio_field_audio_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.audio_field_audio_descr_note + ' (' + cmsmasters_shortcodes.more_info + " <a href='http://www.w3schools.com/html/html5_audio.asp' target='_blank'>" + cmsmasters_shortcodes.click_here + "</a>)</span>", 
				def : 		'[cmsmasters_audio]' + cmsmasters_shortcodes.media_def + '[/cmsmasters_audio]', 
				required : 	true, 
				width : 	'full' 
			}, 
			// Autoplay
			autoplay : { 
				type : 		'checkbox', 
				title : 	cmsmasters_shortcodes.autoplay, 
				descr : 	cmsmasters_shortcodes.audio_field_autoplay_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'true' : 	cmsmasters_shortcodes.choice_enable 
				} 
			}, 
			// Repeat
			loop : { 
				type : 		'checkbox', 
				title : 	cmsmasters_shortcodes.repeat, 
				descr : 	cmsmasters_shortcodes.audio_field_repeat_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'true' : 	cmsmasters_shortcodes.choice_enable 
				} 
			}, 
			// Preload
			preload : { 
				type : 		'radio', 
				title : 	cmsmasters_shortcodes.preload, 
				descr : 	cmsmasters_shortcodes.audio_field_preload_descr, 
				def : 		'none', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'none' : 		cmsmasters_shortcodes.audio_field_preload_choice_none, 
							'auto' : 		cmsmasters_shortcodes.audio_field_preload_choice_auto, 
							'metadata' : 	cmsmasters_shortcodes.audio_field_preload_choice_metadata 
				} 
			}, 
			// CSS3 Animation
			animation : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.animation_title, 
				descr : 	cmsmasters_shortcodes.animation_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.animation_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	get_animations() 
			}, 
			// Animation Delay
			animation_delay : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.animation_delay_title, 
				descr : 	cmsmasters_shortcodes.animation_delay_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.animation_delay_descr_note + "</span>", 
				def : 		'0', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				step : 		'50' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.classes_title, 
				descr : 	cmsmasters_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	}, 
	
	
	// Blog
	cmsmasters_blog : { 
		title : 	cmsmasters_shortcodes.blog_title, 
		icon : 		'admin-icon-blog', 
		pair : 		false, 
		content : 	false, 
		visual : 	false, 
		multiple : 	false, 
		def : 		'', 
		fields : { 
			// Order By
			orderby : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.orderby_title, 
				descr : 	cmsmasters_shortcodes.blog_field_orderby_descr, 
				def : 		'date', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'date' : 		cmsmasters_shortcodes.choice_date, 
							'name' : 		cmsmasters_shortcodes.name, 
							'id' : 			cmsmasters_shortcodes.choice_id, 
							'menu_order' : 	cmsmasters_shortcodes.choice_menu, 
							'popular' : 	cmsmasters_shortcodes.choice_popular 
				} 
			}, 
			// Order
			order : { 
				type : 		'radio', 
				title : 	cmsmasters_shortcodes.order_title, 
				descr : 	cmsmasters_shortcodes.order_descr, 
				def : 		'DESC', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'ASC' : 	cmsmasters_shortcodes.choice_asc, 
							'DESC' : 	cmsmasters_shortcodes.choice_desc 
				} 
			}, 
			// Posts Number
			count : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.blog_field_postsnumber_title, 
				descr : 	cmsmasters_shortcodes.blog_field_postsnumber_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.blog_field_postsnumber_descr_note + "</span>", 
				def : 		'12', 
				required : 	false, 
				width : 	'number', 
				min : 		'1' 
			}, 
			// Categories
			categories : { 
				type : 		'select_multiple', 
				title : 	cmsmasters_shortcodes.categories, 
				descr : 	cmsmasters_shortcodes.blog_field_categories_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.blog_field_categories_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	cmsmasters_composer_categories() 
			}, 
			// Layout
			layout : { 
				type : 		'radio', 
				title : 	cmsmasters_shortcodes.layout, 
				descr : 	'', 
				def : 		'standard', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'standard' : 	cmsmasters_shortcodes.blog_field_layout_choice_standard, 
							'columns' : 	cmsmasters_shortcodes.blog_field_layout_choice_columns, 
							'timeline' : 	cmsmasters_shortcodes.blog_field_layout_choice_timeline 
				} 
			}, 
			// Layout Mode
			layout_mode : { 
				type : 		'radio', 
				title : 	cmsmasters_shortcodes.layout_mode, 
				descr : 	cmsmasters_shortcodes.blog_field_layout_mode_descr, 
				def : 		'grid', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'grid' : 		cmsmasters_shortcodes.choice_grid, 
							'masonry' : 	cmsmasters_shortcodes.blog_field_layout_mode_choice_masonry 
				}, 
				depend : 	'layout:columns' 
			}, 
			// Columns Count
			columns : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.columns_count, 
				descr : 	cmsmasters_shortcodes.blog_field_columns_count_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.blog_field_columns_count_descr_note + "</span>", 
				def : 		'3', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'2' : 	'2', 
							'3' : 	'3', 
							'4' : 	'4' 
				}, 
				depend : 	'layout:columns' 
			}, 
			// Metadata
			metadata : { 
				type : 		'checkbox', 
				title : 	cmsmasters_shortcodes.metadata, 
				descr : 	cmsmasters_shortcodes.blog_field_metadata_descr, 
				def : 		'date,categories,author,comments,likes,more', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'date' : 		cmsmasters_shortcodes.choice_date, 
							'categories' : 	cmsmasters_shortcodes.choice_categories, 
							'author' : 		cmsmasters_shortcodes.choice_author, 
							'comments' : 	cmsmasters_shortcodes.choice_comments, 
							'likes' : 		cmsmasters_shortcodes.choice_likes, 
							'more' : 		cmsmasters_shortcodes.choice_more 
				} 
			}, 
			// Filter
			filter : { 
				type : 		'checkbox', 
				title : 	cmsmasters_shortcodes.filter, 
				descr : 	cmsmasters_shortcodes.blog_field_filter_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'true' : 	cmsmasters_shortcodes.choice_enable 
				}, 
				depend : 	'layout:columns' 
			}, 
			// Filter Button Text
			filter_text : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.filter_text_title, 
				descr : 	cmsmasters_shortcodes.filter_text_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.filter_text_descr_note + ". <br />" + cmsmasters_shortcodes.filter_enabled_text_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				depend : 	'layout:columns' 
			}, 
			// Filter 'All Categories' Text
			filter_cats_text : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.filter_cats_text_title, 
				descr : 	cmsmasters_shortcodes.filter_cats_text_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.filter_cats_text_descr_note + ". <br />" + cmsmasters_shortcodes.filter_enabled_text_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				depend : 	'layout:columns' 
			}, 
			// Pagination
			pagination : { 
				type : 		'radio', 
				title : 	cmsmasters_shortcodes.pagination_title, 
				descr : 	cmsmasters_shortcodes.pagination_descr, 
				def : 		'pagination', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'pagination' : 	cmsmasters_shortcodes.pagination_choice_pagination, 
							'more' : 		cmsmasters_shortcodes.pagination_choice_more, 
							'disabled' : 	cmsmasters_shortcodes.pagination_choice_disabled 
				} 
			}, 
			// 'Load More' Button Text
			more_text : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.pagination_more_text_title, 
				descr : 	cmsmasters_shortcodes.pagination_more_text_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.pagination_more_text_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				depend : 	'pagination:more' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.classes_title, 
				descr : 	cmsmasters_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	}, 
	
	
	// Button
	cmsmasters_button : { 
		title : 	cmsmasters_shortcodes.button, 
		icon : 		'admin-icon-button', 
		pair : 		true, 
		content : 	'button_title', 
		visual : 	'<div><a href="javascript:void(0);" class="cmsmasters_button {{ data.button_icon }}">{{ data.button_title }}&nbsp;</a></div>', 
		multiple : 	false, 
		def : 		"", 
		fields : { 
			// Button Title
			button_title : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.button_field_label_title, 
				descr : 	cmsmasters_shortcodes.button_field_label_descr, 
				def : 		cmsmasters_shortcodes.button, 
				required : 	false, 
				width : 	'half' 
			}, 
			// Button Link
			button_link : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.button_field_link_title, 
				descr : 	cmsmasters_shortcodes.button_field_link_descr, 
				def : 		'', 
				required : 	true, 
				width : 	'half' 
			}, 
			// Button Target
			button_target : { 
				type : 		'radio', 
				title : 	cmsmasters_shortcodes.button_field_target_title, 
				descr : 	cmsmasters_shortcodes.button_field_target_descr, 
				def : 		'self', 
				required : 	false, 
				width : 	'half',  
				choises : { 
							'self' : 	cmsmasters_shortcodes.link_target_choice_self, 
							'blank' : 	cmsmasters_shortcodes.link_target_choice_blank 
				} 
			}, 
			// Button Position
			button_text_align : { 
				type : 		'radio', 
				title : 	cmsmasters_shortcodes.button_field_text_align_title, 
				descr : 	cmsmasters_shortcodes.button_field_text_align_descr, 
				def : 		'center', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'left' : 		cmsmasters_shortcodes.choice_left, 
							'center' : 		cmsmasters_shortcodes.choice_center, 
							'right' : 		cmsmasters_shortcodes.choice_right, 
				} 
			}, 
			// Button Style
			button_style : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.button_field_style_title, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'' : 									cmsmasters_shortcodes.choice_default, 
							'cmsmasters_but_bg_hover' : 					cmsmasters_shortcodes.choice_but_bg_hover, 
							'cmsmasters_but_bg_slide_left' : 			cmsmasters_shortcodes.choice_but_bg_slide_left, 
							'cmsmasters_but_bg_slide_right' : 			cmsmasters_shortcodes.choice_but_bg_slide_right, 
							'cmsmasters_but_bg_slide_top' : 				cmsmasters_shortcodes.choice_but_bg_slide_top, 
							'cmsmasters_but_bg_slide_bottom' : 			cmsmasters_shortcodes.choice_but_bg_slide_bottom, 
							'cmsmasters_but_bg_expand_vert' : 			cmsmasters_shortcodes.choice_but_bg_expand_vert, 
							'cmsmasters_but_bg_expand_hor' : 			cmsmasters_shortcodes.choice_but_bg_expand_hor, 
							'cmsmasters_but_bg_expand_diag' : 			cmsmasters_shortcodes.choice_but_bg_expand_diag, 
							'cmsmasters_but_shadow' : 					cmsmasters_shortcodes.choice_but_shadow, 
							'cmsmasters_but_icon_dark_bg' : 				cmsmasters_shortcodes.choice_but_icon_dark_bg, 
							'cmsmasters_but_icon_light_bg' : 			cmsmasters_shortcodes.choice_but_icon_light_bg, 
							'cmsmasters_but_icon_divider' : 				cmsmasters_shortcodes.choice_but_icon_divider, 
							'cmsmasters_but_icon_inverse' : 				cmsmasters_shortcodes.choice_but_icon_inverse, 
							'cmsmasters_but_icon_slide_left' : 			cmsmasters_shortcodes.choice_but_slide_left, 
							'cmsmasters_but_icon_slide_right' : 			cmsmasters_shortcodes.choice_but_slide_right, 
							'cmsmasters_but_icon_hover_slide_left' : 	cmsmasters_shortcodes.choice_but_hover_slide_left, 
							'cmsmasters_but_icon_hover_slide_right' : 	cmsmasters_shortcodes.choice_but_hover_slide_right, 
							'cmsmasters_but_icon_hover_slide_top' : 		cmsmasters_shortcodes.choice_but_hover_slide_top, 
							'cmsmasters_but_icon_hover_slide_bottom' : 	cmsmasters_shortcodes.choice_but_hover_slide_bottom 
				} 
			}, 
			// Button Google Font
			button_font_family : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.button_field_label_google_font_title, 
				descr : 	cmsmasters_shortcodes.button_field_label_google_font_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.button_field_label_google_font_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	cmsmasters_composer_fonts() 
			}, 
			// Button Font Size
			button_font_size : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.button_field_label_font_size_title, 
				descr : 	cmsmasters_shortcodes.button_field_label_font_size_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.button_field_label_font_size_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'number', 
				min : 		'0' 
			}, 
			// Button Line Height
			button_line_height : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.button_field_label_line_hight_title, 
				descr : 	cmsmasters_shortcodes.button_field_label_line_height_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.button_field_label_line_height_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'number', 
				min : 		'0' 
			}, 
			// Button Font Weight
			button_font_weight : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.button_field_label_font_weight_title, 
				descr : 	cmsmasters_shortcodes.button_field_label_font_weight_descr, 
				def : 		'normal', 
				required : 	false, 
				width : 	'half', 
				choises : 	cmsmasters_composer_font_weight() 
			}, 
			// Button Font Style
			button_font_style : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.button_field_label_font_style_title, 
				descr : 	cmsmasters_shortcodes.button_field_label_font_style_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	cmsmasters_composer_font_style() 
			}, 
			// Button Left & Right Paddings
			button_padding_hor : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.button_field_paddings_title, 
				descr : 	cmsmasters_shortcodes.button_field_paddings_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.button_field_paddings_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'number', 
				min : 		'0' 
			}, 
			// Button Icon
			button_icon : { 
				type : 		'icon', 
				title : 	cmsmasters_shortcodes.button_field_icon_title, 
				descr : 	cmsmasters_shortcodes.button_field_icon_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'full', 
				choises : 	cmsmasters_composer_icons() 
			}, 
			// Button Border Width
			button_border_width : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.button_field_border_width_title, 
				descr : 	cmsmasters_shortcodes.button_field_border_width_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.size_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				max : 		'20' 
			}, 
			// Button Border Style
			button_border_style : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.button_field_border_style_title, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'solid' : 	cmsmasters_shortcodes.choice_solid, 
							'dotted' : 	cmsmasters_shortcodes.choice_dotted, 
							'dashed' : 	cmsmasters_shortcodes.choice_dashed, 
							'double' : 	cmsmasters_shortcodes.choice_double, 
							'groove' : 	cmsmasters_shortcodes.choice_groove, 
							'ridge' : 	cmsmasters_shortcodes.choice_ridge, 
							'inset' : 	cmsmasters_shortcodes.choice_inset, 
							'outset' : 	cmsmasters_shortcodes.choice_outset 
				} 
			}, 
			// Button Border Radius
			button_border_radius : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.button_field_border_radius_title, 
				descr : 	cmsmasters_shortcodes.button_field_border_radius_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.border_radius_descr_note_1 + " <br />" + cmsmasters_shortcodes.border_radius_descr_note_2 + " <a href=\"http://www.css3generator.in/border-radius.html\" target=\"_blank\">" + cmsmasters_shortcodes.border_radius_descr_note_3 + "</a>. <br />" + cmsmasters_shortcodes.border_radius_descr_note_4 + " <a href=\"http://screencast.com/t/krCXdo0NN\" target=\"_blank\">" + cmsmasters_shortcodes.border_radius_descr_note_5 + "</a>.</span>", 
				def : 		'', 
				required : 	false 
			}, 
			// Button Background Color
			button_bg_color : { 
				type : 		'rgba', 
				title : 	cmsmasters_shortcodes.button_field_bg_color_title, 
				descr : 	cmsmasters_shortcodes.button_field_bg_color_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.clear_color_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Button Text Color
			button_text_color : { 
				type : 		'rgba', 
				title : 	cmsmasters_shortcodes.button_field_txt_color_title, 
				descr : 	cmsmasters_shortcodes.button_field_txt_color_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.clear_color_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Button Border Color
			button_border_color : { 
				type : 		'rgba', 
				title : 	cmsmasters_shortcodes.button_field_bd_color_title, 
				descr : 	cmsmasters_shortcodes.button_field_bd_color_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.clear_color_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Button Background Color on Mouseover
			button_bg_color_h : { 
				type : 		'rgba', 
				title : 	cmsmasters_shortcodes.button_field_bg_color_h_title, 
				descr : 	cmsmasters_shortcodes.button_field_bg_color_h_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.clear_color_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Button Text Color on Mouseover
			button_text_color_h : { 
				type : 		'rgba', 
				title : 	cmsmasters_shortcodes.button_field_txt_color_h_title, 
				descr : 	cmsmasters_shortcodes.button_field_txt_color_h_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.clear_color_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Button Border Color on Mouseover
			button_border_color_h : { 
				type : 		'rgba', 
				title : 	cmsmasters_shortcodes.button_field_bd_color_h_title, 
				descr : 	cmsmasters_shortcodes.button_field_bd_color_h_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.clear_color_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// CSS3 Animation
			animation : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.animation_title, 
				descr : 	cmsmasters_shortcodes.animation_descr + " <br /><span>" + cmsmasters_shortcodes.note  + ' ' + cmsmasters_shortcodes.animation_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	get_animations() 
			}, 
			// Animation Delay
			animation_delay : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.animation_delay_title, 
				descr : 	cmsmasters_shortcodes.animation_delay_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.animation_delay_descr_note + "</span>", 
				def : 		'0', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				step : 		'50' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.classes_title, 
				descr : 	cmsmasters_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	}, 
	
	
	// Clients
	cmsmasters_clients : { 
		title : 	cmsmasters_shortcodes.clients_title, 
		icon : 		'admin-icon-clients', 
		pair : 		true, 
		content : 	'clients', 
		visual : 	false, 
		multiple : 	true, 
		def : 		'[cmsmasters_client]' + cmsmasters_shortcodes.name + '[/cmsmasters_client]', 
		fields : { 
			// Clients
			clients : { 
				type : 		'multiple', 
				title : 	cmsmasters_shortcodes.clients_title, 
				descr : 	cmsmasters_shortcodes.clients_field_clients_descr, 
				def : 		'[cmsmasters_client]' + cmsmasters_shortcodes.name + '[/cmsmasters_client]', 
				required : 	true, 
				width : 	'half' 
			}, 
			// Columns Count
			columns : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.columns_count, 
				descr : 	cmsmasters_shortcodes.clients_field_col_count_descr, 
				def : 		'5', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'1' : 	'1', 
							'2' : 	'2', 
							'3' : 	'3', 
							'4' : 	'4', 
							'5' : 	'5' 
				} 
			}, 
			// Layout
			layout : { 
				type : 		'radio', 
				title : 	cmsmasters_shortcodes.layout, 
				descr : 	'', 
				def : 		'grid', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'grid' : 	cmsmasters_shortcodes.choice_grid, 
							'slider' : 	cmsmasters_shortcodes.choice_slider 
				} 
			}, 
			// Slider Height
			height : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.height, 
				descr : 	cmsmasters_shortcodes.clients_field_height_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.clients_field_height_descr_note + "</span>", 
				def : 		'180', 
				required : 	false, 
				width : 	'number', 
				min : 		'0' 
			}, 
			// Slider Slideshow
			autoplay : { 
				type : 		'checkbox', 
				title : 	cmsmasters_shortcodes.autoplay, 
				descr : 	cmsmasters_shortcodes.autoplay_descr, 
				def : 		'true', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'true' : 	cmsmasters_shortcodes.choice_enable 
				}, 
				depend : 	'layout:slider' 
			}, 
			// Slider Slideshow Speed
			speed : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.clients_field_speed_title, 
				descr : 	cmsmasters_shortcodes.clients_field_speed_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.clients_field_speed_descr_note + "</span>", 
				def : 		'1', 
				required : 	false, 
				width : 	'number', 
				min : 		'1', 
				depend : 	'layout:slider' 
			}, 
			// Slider Slides Control
			slides_control : { 
				type : 		'checkbox', 
				title : 	cmsmasters_shortcodes.clients_field_slides_control_title, 
				descr : 	'', 
				def : 		'true', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'true' : 	cmsmasters_shortcodes.choice_enable 
				}, 
				depend : 	'layout:slider' 
			}, 
			// Slider Arrow Control
			arrow_control : { 
				type : 		'checkbox', 
				title : 	cmsmasters_shortcodes.clients_field_arrow_control_title, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'true' : 	cmsmasters_shortcodes.choice_enable 
				}, 
				depend : 	'layout:slider' 
			}, 
			// CSS3 Animation
			animation : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.animation_title, 
				descr : 	cmsmasters_shortcodes.animation_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.animation_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	get_animations() 
			}, 
			// Animation Delay
			animation_delay : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.animation_delay_title, 
				descr : 	cmsmasters_shortcodes.animation_delay_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.animation_delay_descr_note + "</span>", 
				def : 		'0', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				step : 		'50' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.classes_title, 
				descr : 	cmsmasters_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	}, 
	
	
	// Contact Form
	cmsmasters_contact_form : { 
		title : 	cmsmasters_shortcodes.contact_form_title, 
		icon : 		'admin-icon-mail', 
		pair : 		false, 
		content : 	false, 
		visual : 	false, 
		multiple : 	false, 
		def : 		"", 
		fields : { 
			// Contact Form Plugin
			form_plugin : { 
				type : 		'radio', 
				title : 	cmsmasters_shortcodes.contact_form_field_form_plugin_title, 
				descr : 	cmsmasters_shortcodes.contact_form_field_form_plugin_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.contact_form_field_form_plugin_descr_note + "</span>", 
				def : 		'cf7', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'cf7' : 	cmsmasters_shortcodes.contact_form_cf7, 
							'cfb' : 	cmsmasters_shortcodes.contact_form_cfb 
				} 
			}, 
			// Contact Form 7 - Form Name
			form_cf7 : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.contact_form_field_cf7_id_title, 
				descr : 	cmsmasters_shortcodes.contact_form_field_cf7_id_descr, 
				def : 		'', 
				required : 	true, 
				width : 	'half', 
				choises : 	cmsmasters_composer_cf7_forms(), 
				depend : 	'form_plugin:cf7' 
			}, 
			// CMSMasters Contact Form Builder - Form Name
			form_cfb : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.contact_form_field_cfb_id_title, 
				descr : 	cmsmasters_shortcodes.contact_form_field_cfb_id_descr, 
				def : 		'', 
				required : 	true, 
				width : 	'half', 
				choises : 	cmsmasters_composer_cfb_forms(), 
				depend : 	'form_plugin:cfb' 
			}, 
			// CMSMasters Contact Form Builder - Email Address
			email_cfb : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.contact_form_field_cfb_email_title, 
				descr : 	cmsmasters_shortcodes.contact_form_field_cfb_email_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.contact_form_field_cfb_email_descr_note + "</span>", 
				def : 		'', 
				required : 	true, 
				width : 	'half', 
				depend : 	'form_plugin:cfb' 
			}, 
			// CSS3 Animation
			animation : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.animation_title, 
				descr : 	cmsmasters_shortcodes.animation_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.animation_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	get_animations() 
			}, 
			// Animation Delay
			animation_delay : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.animation_delay_title, 
				descr : 	cmsmasters_shortcodes.animation_delay_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.animation_delay_descr_note + "</span>", 
				def : 		'0', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				step : 		'50' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.classes_title, 
				descr : 	cmsmasters_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	}, 
	
	
	// Counters
	cmsmasters_counters : { 
		title : 	cmsmasters_shortcodes.counters_title, 
		icon : 		'admin-icon-counter', 
		pair : 		true, 
		content : 	'counters', 
		visual : 	false, 
		multiple : 	true, 
		def : 		'[cmsmasters_counter value="0"]' + cmsmasters_shortcodes.title + '[/cmsmasters_counter]', 
		fields : { 
			// Counters
			counters : { 
				type : 		'multiple', 
				title : 	cmsmasters_shortcodes.counters_title, 
				descr : 	cmsmasters_shortcodes.counters_field_counters_descr, 
				def : 		'[cmsmasters_counter value="0"]' + cmsmasters_shortcodes.title + '[/cmsmasters_counter]', 
				required : 	true, 
				width : 	'half' 
			}, 
			// Type
			type : { 
				type : 		'radio', 
				title : 	cmsmasters_shortcodes.counters_field_type_title, 
				descr : 	'', 
				def : 		'horizontal', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'horizontal' : 	cmsmasters_shortcodes.choice_icon_side, 
							'vertical' : 	cmsmasters_shortcodes.choice_icon_top 
				} 
			}, 
			// Number per Row
			count : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.counters_field_number_per_row_title, 
				descr : 	cmsmasters_shortcodes.counters_field_number_per_row_descr, 
				def : 		'5', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'5' : 	'5', 
							'4' : 	'4', 
							'3' : 	'3', 
							'2' : 	'2', 
							'1' : 	'1' 
				} 
			}, 
			// Icon Size
			icon_size : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.icon_list_field_icon_size_title, 
				descr : 	"<span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.size_note_short + ' ' + cmsmasters_shortcodes.value_zero + "</span>", 
				def : 		'30', 
				required : 	true, 
				width : 	'number', 
				min : 		'0' 
			}, 
			// Icon Space
			icon_space : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.icon_list_field_icon_space_title, 
				descr : 	cmsmasters_shortcodes.icon_list_field_icon_space_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.value_zero + "</span>", 
				def : 		'60', 
				required : 	true, 
				width : 	'number', 
				min : 		'0' 
			}, 
			// Icon Border Width
			icon_border_width : { 
				type : 		'range', 
				title : 	cmsmasters_shortcodes.icon_box_field_icon_border_width_title, 
				descr : 	"<span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.size_note_pixel + "</span>", 
				def : 		'0', 
				required : 	true, 
				width : 	'number', 
				min : 		'0', 
				max : 		'20' 
			}, 
			// Icon Border Radius
			icon_border_radius : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.icon_box_field_icon_border_radius_title, 
				descr : 	cmsmasters_shortcodes.counter_field_icon_border_radius_descr + ' ' + cmsmasters_shortcodes.value_zero + ". <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.border_radius_descr_note_1 + " <br />" + cmsmasters_shortcodes.border_radius_descr_note_2 + " <a href=\"http://www.css3generator.in/border-radius.html\" target=\"_blank\">" + cmsmasters_shortcodes.border_radius_descr_note_3 + "</a>. <br />" + cmsmasters_shortcodes.border_radius_descr_note_4 + " <a href=\"http://screencast.com/t/krCXdo0NN\" target=\"_blank\">" + cmsmasters_shortcodes.border_radius_descr_note_5 + "</a>.</span>", 
				def : 		'50%', 
				required : 	false, 
				width : 	'half' 
			}, 
			// CSS3 Animation
			animation : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.animation_title, 
				descr : 	cmsmasters_shortcodes.animation_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.animation_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	get_animations() 
			}, 
			// Animation Delay
			animation_delay : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.animation_delay_title, 
				descr : 	cmsmasters_shortcodes.animation_delay_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.animation_delay_descr_note + "</span>", 
				def : 		'0', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				step : 		'50' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.classes_title, 
				descr : 	cmsmasters_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	}, 
	
	
	// Divider
	cmsmasters_divider : { 
		title : 	cmsmasters_shortcodes.divider, 
		icon : 		'admin-icon-divider', 
		pair : 		false, 
		content : 	false, 
		visual : 	false, 
		multiple : 	false, 
		def : 		"", 
		fields : { 
			// Divider width
			width : { 
				type : 		'radio', 
				title : 	cmsmasters_shortcodes.divider_length, 
				descr : 	'', 
				def : 		'long', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'short' : 	cmsmasters_shortcodes.choice_short, 
							'medium' : 	cmsmasters_shortcodes.choice_medium, 
							'long' : 	cmsmasters_shortcodes.choice_long 
				} 
			}, 
			// Divider Height
			height : { 
				type : 		'range', 
				title : 	cmsmasters_shortcodes.divider_width, 
				descr : 	"<span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.size_note_pixel + "</span>", 
				def : 		'1', 
				required : 	true, 
				width : 	'number', 
				min : 		'0', 
				max : 		'20' 
			}, 
			// Divider Style
			style : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.divider_style, 
				descr : 	'', 
				def : 		'', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'solid' : 	cmsmasters_shortcodes.choice_solid, 
							'dotted' : 	cmsmasters_shortcodes.choice_dotted, 
							'dashed' : 	cmsmasters_shortcodes.choice_dashed, 
							'double' : 	cmsmasters_shortcodes.choice_double, 
							'groove' : 	cmsmasters_shortcodes.choice_groove, 
							'ridge' : 	cmsmasters_shortcodes.choice_ridge 
				} 
			}, 
			// Divider Position
			position : { 
				type : 		'radio', 
				title : 	cmsmasters_shortcodes.divider_position, 
				descr : 	'', 
				def : 		'center', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'left' : 		cmsmasters_shortcodes.choice_left, 
							'center' : 		cmsmasters_shortcodes.choice_center, 
							'right' : 		cmsmasters_shortcodes.choice_right 
				} 
			}, 
			// Divider Color
			color : { 
				type : 		'rgba', 
				title : 	cmsmasters_shortcodes.divider_custom_color, 
				descr : 	"<span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.divider_custom_color_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Top Margin
			margin_top : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.top_margin, 
				descr : 	"<span>" + cmsmasters_shortcodes.note + ' ' +  cmsmasters_shortcodes.size_note_short + ' ' + cmsmasters_shortcodes.value_zero + "</span>", 
				def : 		'50', 
				required : 	false, 
				width : 	'number', 
				min : 		'0' 
			}, 
			// Bottom Margin
			margin_bottom : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.bottom_margin, 
				descr : 	 "<span>" + cmsmasters_shortcodes.note + ' ' +  cmsmasters_shortcodes.size_note_short + ' ' + cmsmasters_shortcodes.value_zero + "</span>", 
				def : 		'50', 
				required : 	false, 
				width : 	'number', 
				min : 		'0' 
			}, 
			// CSS3 Animation
			animation : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.animation_title, 
				descr : 	cmsmasters_shortcodes.animation_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.animation_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	get_animations() 
			}, 
			// Animation Delay
			animation_delay : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.animation_delay_title, 
				descr : 	cmsmasters_shortcodes.animation_delay_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.animation_delay_descr_note + "</span>", 
				def : 		'0', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				step : 		'50' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.classes_title, 
				descr : 	cmsmasters_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	}, 
	
	
	// Embed
	cmsmasters_embed : { 
		title : 	cmsmasters_shortcodes.embed_title, 
		icon : 		'admin-icon-embed', 
		pair : 		false, 
		content : 	false, 
		visual : 	false, 
		multiple : 	false, 
		def : 		'', 
		fields : { 
			// Link
			link : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.link, 
				descr : 	cmsmasters_shortcodes.embed_field_link_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.embed_field_link_descr_note + ' ' + "<a href='http://codex.wordpress.org/Embed_Shortcode#Okay.2C_So_What_Sites_Can_I_Embed_From.3F' target='_blank'>" + cmsmasters_shortcodes.embed_field_link_descr_note_link + "</a></span>", 
				def : 		'', 
				required : 	true, 
				width : 	'full' 
			}, 
			// Max Width
			width : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.embed_field_maxwidth_title, 
				descr : 	cmsmasters_shortcodes.embed_field_maxwidth_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' +  cmsmasters_shortcodes.size_note_short + ' ' + cmsmasters_shortcodes.embed_field_maxwidth_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'number', 
				min : 		'0' 
			}, 
			// Max Height
			height : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.embed_field_maxheight_title, 
				descr : 	cmsmasters_shortcodes.embed_field_maxheight_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' +  cmsmasters_shortcodes.size_note_short + ' ' + cmsmasters_shortcodes.embed_field_maxheight_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'number', 
				min : 		'0' 
			}, 
			// Wrap Video
			wrap : { 
				type : 		'checkbox', 
				title : 	cmsmasters_shortcodes.embed_field_wrap_title, 
				descr : 	cmsmasters_shortcodes.embed_field_wrap_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.embed_field_wrap_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'true' : 	'Enable' 
				} 
			}, 
			// CSS3 Animation
			animation : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.animation_title, 
				descr : 	cmsmasters_shortcodes.animation_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.animation_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	get_animations() 
			}, 
			// Animation Delay
			animation_delay : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.animation_delay_title, 
				descr : 	cmsmasters_shortcodes.animation_delay_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.animation_delay_descr_note + "</span>", 
				def : 		'0', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				step : 		'50' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.classes_title, 
				descr : 	cmsmasters_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	}, 
	
	
	// Featured Block
	cmsmasters_featured_block : { 
		title : 	cmsmasters_shortcodes.featured_title, 
		icon : 		'admin-icon-featured-block', 
		pair : 		true, 
		content : 	'content', 
		visual : 	'<div><div>{{ data.content }}</div></div>', 
		multiple : 	false, 
		def : 		"<p>" + cmsmasters_shortcodes.def_text + "</p>", 
		fields : { 
			// Content
			content : { 
				type : 		'editor', 
				title : 	cmsmasters_shortcodes.content, 
				descr : 	"", 
				def : 		"<p>" + cmsmasters_shortcodes.def_text + "</p>", 
				required : 	false, 
				width : 	'full' 
			}, 
			// Text Width
			text_width : { 
				type : 		'range', 
				title : 	cmsmasters_shortcodes.featured_field_text_width_title, 
				descr : 	cmsmasters_shortcodes.featured_field_text_width_descr, 
				def : 		'100', 
				required : 	true, 
				width : 	'number', 
				min : 		'0', 
				max : 		'100' 
			}, 
			// Text Position
			text_position : { 
				type : 		'radio', 
				title : 	cmsmasters_shortcodes.featured_field_text_position, 
				descr : 	'', 
				def : 		'center', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'left' : 		cmsmasters_shortcodes.choice_left, 
							'center' : 		cmsmasters_shortcodes.choice_center, 
							'right' : 		cmsmasters_shortcodes.choice_right 
				} 
			}, 
			// Text Paddings
			text_padding : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.featured_field_text_padding_title, 
				descr : 	cmsmasters_shortcodes.featured_field_text_padding_descr + ". <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.featured_field_text_padding_descr_note + ". <br />" + cmsmasters_shortcodes.featured_field_text_padding_descr_note_1 + " <a href=\"#\" target=\"_blank\">" + cmsmasters_shortcodes.featured_field_text_padding_descr_note_2 + "</a>.</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Text Align
			text_align : { 
				type : 		'radio', 
				title : 	cmsmasters_shortcodes.text_align, 
				descr : 	'', 
				def : 		'left', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'left' : 		cmsmasters_shortcodes.choice_left, 
							'center' : 		cmsmasters_shortcodes.choice_center, 
							'right' : 		cmsmasters_shortcodes.choice_right 
				} 
			}, 
			// Color Overlay
			color_overlay : { 
				type : 		'rgba', 
				title : 	cmsmasters_shortcodes.row_field_color_overlay_title, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Background Color
			fb_bg_color : { 
				type : 		'rgba', 
				title : 	cmsmasters_shortcodes.featured_field_block_bg_color_title, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Background Image
			bg_img : { 
				type : 			'upload', 
				title : 		cmsmasters_shortcodes.row_field_bg_image_title, 
				descr : 		"", 
				def : 			'', 
				required : 		false, 
				width : 		'half', 
				frame : 		'post', 
				library : 		'image', 
				multiple : 		false, 
				description : 	false, 
				caption : 		false, 
				align : 		false, 
				link : 			false, 
				size : 			true 
			}, 
			// Background Position
			bg_position : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.row_field_bg_position_title, 
				descr : 	"", 
				def : 		'top center', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'top left' : 		cmsmasters_shortcodes.row_field_bg_position_choice_vert_top + ' - ' + cmsmasters_shortcodes.row_field_bg_position_choice_horiz_left, 
							'top center' : 		cmsmasters_shortcodes.row_field_bg_position_choice_vert_top + ' - ' + cmsmasters_shortcodes.row_field_bg_position_choice_horiz_center, 
							'top right' : 		cmsmasters_shortcodes.row_field_bg_position_choice_vert_top + ' - ' + cmsmasters_shortcodes.row_field_bg_position_choice_horiz_right, 
							'center left' : 	cmsmasters_shortcodes.row_field_bg_position_choice_vert_center + ' - ' + cmsmasters_shortcodes.row_field_bg_position_choice_horiz_left, 
							'center center' : 	cmsmasters_shortcodes.row_field_bg_position_choice_vert_center + ' - ' + cmsmasters_shortcodes.row_field_bg_position_choice_horiz_center, 
							'center right' : 	cmsmasters_shortcodes.row_field_bg_position_choice_vert_center + ' - ' + cmsmasters_shortcodes.row_field_bg_position_choice_horiz_right, 
							'bottom left' : 	cmsmasters_shortcodes.row_field_bg_position_choice_vert_bottom + ' - ' + cmsmasters_shortcodes.row_field_bg_position_choice_horiz_left, 
							'bottom center' : 	cmsmasters_shortcodes.row_field_bg_position_choice_vert_bottom + ' - ' + cmsmasters_shortcodes.row_field_bg_position_choice_horiz_center, 
							'bottom right' : 	cmsmasters_shortcodes.row_field_bg_position_choice_vert_bottom + ' - ' + cmsmasters_shortcodes.row_field_bg_position_choice_horiz_right 
				}, 
				depend : 	'bg_img:!' 
			}, 
			// Background Repeat
			bg_repeat : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.row_field_bg_repeat_title, 
				descr : 	"", 
				def : 		'no-repeat', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'no-repeat' : 	cmsmasters_shortcodes.row_field_bg_repeat_choice_none, 
							'repeat-x' : 	cmsmasters_shortcodes.row_field_bg_repeat_choice_horiz, 
							'repeat-y' : 	cmsmasters_shortcodes.row_field_bg_repeat_choice_vert, 
							'repeat' : 		cmsmasters_shortcodes.row_field_bg_repeat_choice_repeat 
				}, 
				depend : 	'bg_img:!' 
			}, 
			// Background Attachment
			bg_attachment : { 
				type : 		'radio', 
				title : 	cmsmasters_shortcodes.row_field_bg_attachement_title, 
				descr : 	"", 
				def : 		'scroll', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'scroll' : 	cmsmasters_shortcodes.row_field_bg_attachement_choice_scroll, 
							'fixed' : 	cmsmasters_shortcodes.row_field_bg_attachement_choice_fixed 
				}, 
				depend : 	'bg_img:!' 
			}, 
			// Background Size
			bg_size : { 
				type : 		'radio', 
				title : 	cmsmasters_shortcodes.row_field_bg_size_title, 
				descr : 	"<span>" + cmsmasters_shortcodes.row_field_bg_size_choice_auto + ': ' + cmsmasters_shortcodes.row_field_bg_size_descr_auto + "<br />" + cmsmasters_shortcodes.row_field_bg_size_choice_cover + ': ' + cmsmasters_shortcodes.row_field_bg_size_descr_cover + "<br />" + cmsmasters_shortcodes.row_field_bg_size_choice_contain + ': ' + cmsmasters_shortcodes.row_field_bg_size_descr_contain + "</span>", 
				def : 		'cover', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'auto' : 		cmsmasters_shortcodes.row_field_bg_size_choice_auto, 
							'cover' : 		cmsmasters_shortcodes.row_field_bg_size_choice_cover, 
							'contain' : 	cmsmasters_shortcodes.row_field_bg_size_choice_contain 
				}, 
				depend : 	'bg_img:!' 
			}, 
			// Top Padding
			top_padding : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.featured_field_top_padding_title, 
				descr : 	"<span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.size_note_short + ' ' + cmsmasters_shortcodes.value_zero + "</span>", 
				def : 		'0', 
				required : 	false, 
				width : 	'number', 
				min : 		'0' 
			}, 
			// Bottom Padding
			bottom_padding : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.featured_field_bottom_padding_title, 
				descr : 	"<span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.size_note_short + ' ' + cmsmasters_shortcodes.value_zero + "</span>", 
				def : 		'0', 
				required : 	false, 
				width : 	'number', 
				min : 		'0' 
			}, 
			// Border Radius
			border_radius : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.featured_field_border_radius_title, 
				descr : 	cmsmasters_shortcodes.featured_field_border_radius_descr + ' ' + cmsmasters_shortcodes.value_zero + ". <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.border_radius_descr_note_1 + " <br />" + cmsmasters_shortcodes.border_radius_descr_note_2 + " <a href=\"http://www.css3generator.in/border-radius.html\" target=\"_blank\">" + cmsmasters_shortcodes.border_radius_descr_note_3 + "</a>. <br />" + cmsmasters_shortcodes.border_radius_descr_note_4 + " <a href=\"http://screencast.com/t/krCXdo0NN\" target=\"_blank\">" + cmsmasters_shortcodes.border_radius_descr_note_5 + "</a>.</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// CSS3 Animation
			animation : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.animation_title, 
				descr : 	cmsmasters_shortcodes.animation_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.animation_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	get_animations() 
			}, 
			// Animation Delay
			animation_delay : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.animation_delay_title, 
				descr : 	cmsmasters_shortcodes.animation_delay_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.animation_delay_descr_note + "</span>", 
				def : 		'0', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				step : 		'50' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.classes_title, 
				descr : 	cmsmasters_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	}, 
	
	
	// Gallery
	cmsmasters_gallery : { 
		title : 	cmsmasters_shortcodes.gallery_title, 
		icon : 		'admin-icon-gallery', 
		pair : 		true, 
		content : 	'images', 
		visual : 	false, 
		multiple : 	false, 
		def : 		'', 
		fields : { 
			// Images
			images : { 
				type : 		'gallery', 
				title : 	cmsmasters_shortcodes.gallery_field_images_title, 
				descr : 	cmsmasters_shortcodes.gallery_field_images_descr, 
				def : 		'', 
				required : 	true, 
				width : 	'full' 
			}, 
			// Layout
			layout : { 
				type : 		'radio', 
				title : 	cmsmasters_shortcodes.layout, 
				descr : 	"<span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.gallery_field_layout_descr_note + "</span>", 
				def : 		'hover', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'hover' : 	cmsmasters_shortcodes.gallery_field_layout_choice_hover, 
							'slider' : 	cmsmasters_shortcodes.choice_slider, 
							'gallery' : cmsmasters_shortcodes.gallery_field_layout_choice_gallery 
				} 
			}, 
			// Gallery Type
			gallery_type : { 
				type : 		'radio', 
				title : 	cmsmasters_shortcodes.gallery_field_gallery_type_title, 
				descr : 	"", 
				def : 		'grid', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'grid' : 		cmsmasters_shortcodes.gallery_field_gallery_type_grid, 
							'masonry' : 	cmsmasters_shortcodes.gallery_field_gallery_type_masonry 
				}, 
				depend : 	'layout:gallery' 
			}, 
			// Gallery Count
			gallery_count : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.gallery_field_gallery_count_title, 
				descr : 	cmsmasters_shortcodes.gallery_field_gallery_count_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.gallery_field_gallery_count_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'number', 
				min : 		'1', 
				depend : 	'layout:gallery' 
			}, 
			// Gallery 'Load More' Button Text
			gallery_more_text : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.pagination_more_text_title, 
				descr : 	cmsmasters_shortcodes.pagination_more_text_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.pagination_more_text_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				depend : 	'layout:gallery' 
			}, 
			// Gallery Padding
			gallery_padding : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.gallery_field_gallery_padding_title, 
				descr : 	"<span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.gallery_field_gallery_padding_descr_note + "</span>", 
				def : 		'10', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				depend : 	'layout:gallery' 
			}, 
			// Image Size Slider
			image_size_slider : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.gallery_field_image_size_slider_title, 
				descr : 	'', 
				def : 		'full', 
				required : 	false, 
				width : 	'half', 
				choises : 	cmsmasters_composer_thumbnail_sizes(), 
				depend : 	'layout:slider' 
			}, 
			// Image Size Gallery
			image_size_gallery : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.gallery_field_image_size_title, 
				descr : 	cmsmasters_shortcodes.gallery_field_image_size_descr, 
				def : 		'full', 
				required : 	false, 
				width : 	'half', 
				choises : 	cmsmasters_composer_thumbnail_sizes(), 
				depend : 	'layout:gallery' 
			}, 
			// Hover Slider Pause Time
			hover_pause : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.pause_time, 
				descr : 	"<span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.autoslide_def + "</span>", 
				def : 		'5', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				depend : 	'layout:hover' 
			}, 
			// Hover Slider Active Slide
			hover_active : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.gallery_field_hoversl_activesl_title, 
				descr : 	"<span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.gallery_field_hoversl_activesl_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'number', 
				min : 		'1', 
				depend : 	'layout:hover' 
			}, 
			// Hover Slider Pause on Hover
			hover_pause_on_hover : { 
				type : 		'checkbox', 
				title : 	cmsmasters_shortcodes.pause_on_hover, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'true' : 	cmsmasters_shortcodes.choice_enable 
				}, 
				depend : 	'layout:hover' 
			}, 
			// Slider Animation Effect
			slider_effect : { 
				type : 		'radio', 
				title : 	cmsmasters_shortcodes.gallery_field_sl_animeffect_title, 
				descr : 	'', 
				def : 		'slide', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'slide' : 		cmsmasters_shortcodes.gallery_field_sl_animeffect_choice_slide, 
							'fade' : 		cmsmasters_shortcodes.gallery_field_sl_animeffect_choice_fade
				}, 
				depend : 	'layout:slider' 
			}, 
			// Slider Autoplay
			slider_autoplay : { 
				type : 		'checkbox', 
				title : 	cmsmasters_shortcodes.autoplay, 
				descr : 	cmsmasters_shortcodes.autoplay_descr, 
				def : 		'true', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'true' : 	cmsmasters_shortcodes.choice_enable 
				}, 
				depend : 	'layout:slider' 
			}, 
			// Slider Slideshow Speed
			slider_slideshow_speed : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.gallery_field_sl_slideshow_speed_title, 
				descr : 	cmsmasters_shortcodes.gallery_field_sl_slideshow_speed_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.gallery_field_sl_slideshow_speed_descr_note + "</span>", 
				def : 		'7', 
				required : 	false, 
				width : 	'number', 
				min : 		'1', 
				depend : 	'layout:slider' 
			}, 
			// Slider Animation Speed
			slider_animation_speed : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.gallery_field_sl_anim_speed_title, 
				descr : 	cmsmasters_shortcodes.gallery_field_sl_anim_speed_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.gallery_field_sl_anim_speed_descr_note + "</span>", 
				def : 		'600', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				step : 		'50', 
				depend : 	'layout:slider' 
			},
			// Slider Pause on Hover
			slider_pause_on_hover : { 
				type : 		'checkbox', 
				title : 	cmsmasters_shortcodes.pause_on_hover, 
				descr : 	'', 
				def : 		'true', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'true' : 	cmsmasters_shortcodes.choice_enable 
				}, 
				depend : 	'layout:slider' 
			}, 
			// Slider Rewind
			slider_rewind : { 
				type : 		'checkbox', 
				title : 	cmsmasters_shortcodes.gallery_field_sl_rewind_title, 
				descr : 	cmsmasters_shortcodes.gallery_field_sl_rewind_descr, 
				def : 		'true', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'true' : 	cmsmasters_shortcodes.choice_enable 
				}, 
				depend : 	'layout:slider' 
			}, 
			// Slider Rewind Speed
			slider_rewind_speed : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.gallery_field_sl_rewind_speed_title, 
				descr : 	cmsmasters_shortcodes.gallery_field_sl_rewind_speed_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.gallery_field_sl_rewind_speed_descr_note + "</span>", 
				def : 		'1000', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				step : 		'50', 
				depend : 	'layout:slider' 
			},
			// Slider Navigation Control
			slider_nav_control : { 
				type : 		'checkbox', 
				title : 	cmsmasters_shortcodes.gallery_field_sl_navcontrol_title, 
				descr : 	'', 
				def : 		'true', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'true' : 	cmsmasters_shortcodes.choice_enable 
				}, 
				depend : 	'layout:slider' 
			},  
			// Slider Arrow Navigation
			slider_nav_arrow : { 
				type : 		'checkbox', 
				title : 	cmsmasters_shortcodes.gallery_field_sl_arrownav_title, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'true' : 	cmsmasters_shortcodes.choice_enable 
				}, 
				depend : 	'layout:slider' 
			},
			// Image Gallery Columns
			gallery_columns : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.gallery_field_imagegall_columns_title, 
				descr : 	'', 
				def : 		'4', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'4' : 		cmsmasters_shortcodes.gallery_field_imagegall_columns_choice_four, 
							'3' : 		cmsmasters_shortcodes.gallery_field_imagegall_columns_choice_three, 
							'2' : 		cmsmasters_shortcodes.gallery_field_imagegall_columns_choice_two, 
							'1' : 		cmsmasters_shortcodes.gallery_field_imagegall_columns_choice_one
				}, 
				depend : 	'layout:gallery' 
			}, 
			// Gallery Images Links
			gallery_links : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.gallery_field_imagegall_imglinks_title, 
				descr : 	'', 
				def : 		'lightbox', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'lightbox' : 	cmsmasters_shortcodes.gallery_field_imagegall_imglinks_choice_box, 
							'self' : 		cmsmasters_shortcodes.gallery_field_imagegall_imglinks_choice_self, 
							'blank' : 		cmsmasters_shortcodes.gallery_field_imagegall_imglinks_choice_blank, 
							'none' : 		cmsmasters_shortcodes.gallery_field_imagegall_imglinks_choice_none 
				}, 
				depend : 	'layout:gallery' 
			}, 
			// CSS3 Animation
			animation : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.animation_title, 
				descr : 	cmsmasters_shortcodes.animation_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.animation_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	get_animations() 
			}, 
			// Animation Delay
			animation_delay : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.animation_delay_title, 
				descr : 	cmsmasters_shortcodes.animation_delay_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.animation_delay_descr_note + "</span>", 
				def : 		'0', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				step : 		'50' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.classes_title, 
				descr : 	cmsmasters_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	}, 
	
	
	// Google Map Markers
	cmsmasters_google_map_markers : { 
		title : 	cmsmasters_shortcodes.map_markers_title, 
		icon : 		'admin-icon-map', 
		pair : 		true, 
		content : 	'markers', 
		visual : 	false, 
		multiple : 	true, 
		def : 		'[cmsmasters_google_map_marker][/cmsmasters_google_map_marker]', 
		fields : { 
			// Markers
			markers : { 
				type : 		'multiple', 
				title : 	cmsmasters_shortcodes.map_markers_field_markers_title, 
				descr : 	cmsmasters_shortcodes.map_markers_field_markers_descr, 
				def : 		'[cmsmasters_google_map_marker][/cmsmasters_google_map_marker]', 
				required : 	true, 
				width : 	'half' 
			}, 
			// Address Type
			address_type : { 
				type : 		'radio', 
				title : 	cmsmasters_shortcodes.map_markers_field_address_type_title, 
				descr : 	'', 
				def : 		'address', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'address' : 		cmsmasters_shortcodes.map_markers_field_address_type_choice_address, 
							'coordinates' : 	cmsmasters_shortcodes.map_markers_field_address_type_choice_coord 
				} 
			}, 
			// Address
			address : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.map_markers_field_address_title, 
				descr : 	cmsmasters_shortcodes.map_markers_field_address_descr, 
				def : 		'', 
				required : 	true, 
				width : 	'half', 
				depend : 	'address_type:address' 
			}, 
			// Latitude
			latitude : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.map_markers_field_latitude_title, 
				descr : 	"<span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.value_number + "</span>", 
				def : 		'', 
				required : 	true, 
				width : 	'small', 
				depend : 	'address_type:coordinates' 
			}, 
			// Longitude
			longitude : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.map_markers_field_longitude_title, 
				descr : 	"<span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.value_number + "</span>", 
				def : 		'', 
				required : 	true, 
				width : 	'small', 
				depend : 	'address_type:coordinates' 
			}, 
			// Type
			type : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.map_markers_field_type_title, 
				descr : 	'', 
				def : 		'ROADMAP', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'ROADMAP' : 	cmsmasters_shortcodes.map_markers_field_type_choice_roadmap, 
							'TERRAIN' : 	cmsmasters_shortcodes.map_markers_field_type_choice_terrain, 
							'HYBRID' : 		cmsmasters_shortcodes.map_markers_field_type_choice_hybrid, 
							'SATELLITE' : 	cmsmasters_shortcodes.map_markers_field_type_choice_sattelite 
				} 
			}, 
			// Zoom
			zoom : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.map_markers_field_zoom_title, 
				descr : 	'', 
				def : 		'14', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'1' : 	'1', 
							'2' : 	'2', 
							'3' : 	'3', 
							'4' : 	'4', 
							'5' : 	'5', 
							'6' : 	'6', 
							'7' : 	'7', 
							'8' : 	'8', 
							'9' : 	'9', 
							'10' : 	'10', 
							'11' : 	'11', 
							'12' : 	'12', 
							'13' : 	'13', 
							'14' : 	'14', 
							'15' : 	'15', 
							'16' : 	'16', 
							'17' : 	'17', 
							'18' : 	'18', 
							'19' : 	'19' 
				} 
			}, 
			// Height Type
			height_type : { 
				type : 		'radio', 
				title : 	cmsmasters_shortcodes.map_markers_field_height_type_title, 
				descr : 	'', 
				def : 		'auto', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'auto' : 	cmsmasters_shortcodes.map_markers_field_height_type_choice_auto, 
							'fixed' : 	cmsmasters_shortcodes.map_markers_field_height_type_choice_fixed 
				} 
			}, 
			// Height
			height : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.height, 
				descr : 	cmsmasters_shortcodes.map_markers_field_height_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' +  cmsmasters_shortcodes.size_note_short + ' ' + cmsmasters_shortcodes.map_markers_field_height_descr_note + "</span>", 
				def : 		'300', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				depend : 	'height_type:fixed' 
			}, 
			// Scrollwheel
			scroll_wheel : { 
				type : 		'checkbox', 
				title : 	cmsmasters_shortcodes.map_markers_field_scrollwheel_title, 
				descr : 	'', 
				def : 		'true', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'true' : 	'Enable' 
				} 
			}, 
			// Double Click Zoom
			double_click_zoom : { 
				type : 		'checkbox', 
				title : 	cmsmasters_shortcodes.map_markers_field_doubleclick_zoom_title, 
				descr : 	'', 
				def : 		'true', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'true' : 	cmsmasters_shortcodes.choice_enable 
				} 
			}, 
			// Pan Control
			pan_control : { 
				type : 		'checkbox', 
				title : 	cmsmasters_shortcodes.map_markers_field_pan_control_title, 
				descr : 	'', 
				def : 		'true', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'true' : 	cmsmasters_shortcodes.choice_enable 
				} 
			}, 
			// Zoom Control
			zoom_control : { 
				type : 		'checkbox', 
				title : 	cmsmasters_shortcodes.map_markers_field_zoom_control_title, 
				descr : 	'', 
				def : 		'true', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'true' : 	cmsmasters_shortcodes.choice_enable 
				} 
			}, 
			// Map Type Control
			map_type_control : { 
				type : 		'checkbox', 
				title : 	cmsmasters_shortcodes.map_markers_field_maptype_control_title, 
				descr : 	'', 
				def : 		'true', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'true' : 	cmsmasters_shortcodes.choice_enable 
				} 
			}, 
			// Scale Control
			scale_control : { 
				type : 		'checkbox', 
				title : 	cmsmasters_shortcodes.map_markers_field_scale_control_title, 
				descr : 	'', 
				def : 		'true', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'true' : 	cmsmasters_shortcodes.choice_enable 
				} 
			}, 
			// Street View Control
			street_view_control : { 
				type : 		'checkbox', 
				title : 	cmsmasters_shortcodes.map_markers_field_strtview_control_title, 
				descr : 	"<span>" + cmsmasters_shortcodes.note + ' ' +  cmsmasters_shortcodes.map_markers_field_strtview_control_descr_note + "</span>", 
				def : 		'true', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'true' : 	cmsmasters_shortcodes.choice_enable 
				} 
			}, 
			// Overview Map Control
			overview_map_control : { 
				type : 		'checkbox', 
				title : 	cmsmasters_shortcodes.map_markers_field_overview_map_control_title, 
				descr : 	'', 
				def : 		'true', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'true' : 	cmsmasters_shortcodes.choice_enable 
				} 
			}, 
			// CSS3 Animation
			animation : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.animation_title, 
				descr : 	cmsmasters_shortcodes.animation_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.animation_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	get_animations() 
			}, 
			// Animation Delay
			animation_delay : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.animation_delay_title, 
				descr : 	cmsmasters_shortcodes.animation_delay_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.animation_delay_descr_note + "</span>", 
				def : 		'0', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				step : 		'50' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.classes_title, 
				descr : 	cmsmasters_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	}, 
	
	
	// Icon
	cmsmasters_simple_icon : { 
		title : 	cmsmasters_shortcodes.icon, 
		icon : 		'admin-icon-icon', 
		pair : 		true, 
		content : 	'classes', 
		visual : 	'<div><div class="cmsmasters_simple_icon {{ data.icon }}" style="font-size:{{ data.size }}px; line-height:{{ data.size }}px; text-align:{{ data.text_align }};"></div></div>', 
		multiple : 	false, 
		def : 		"", 
		fields : { 
			// Icon
			icon : { 
				type : 		'icon', 
				title : 	cmsmasters_shortcodes.icon, 
				descr : 	cmsmasters_shortcodes.icon_field_icon_descr, 
				def : 		'cmsmasters-icon-thumbs-up', 
				required : 	true, 
				width : 	'full', 
				choises : 	cmsmasters_composer_icons() 
			}, 
			// Size
			size : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.size, 
				descr : 	cmsmasters_shortcodes.icon_field_size_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.icon_field_size_descr_note + "</span>", 
				def : 		'40', 
				required : 	true, 
				width : 	'number', 
				min : 		'0' 
			}, 
			// Space
			space : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.icon_list_field_icon_space_title, 
				descr : 	cmsmasters_shortcodes.icon_list_field_icon_space_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.icon_field_space_descr_note + "</span>", 
				def : 		'60', 
				required : 	true, 
				width : 	'number', 
				min : 		'0' 
			}, 
			// Display
			display : { 
				type : 		'radio', 
				title : 	cmsmasters_shortcodes.icon_field_display_title, 
				descr : 	cmsmasters_shortcodes.icon_field_display_descr, 
				def : 		'block', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'block' : 			cmsmasters_shortcodes.choice_block, 
							'inline' : 			cmsmasters_shortcodes.choice_inline, 
							'inline-block' : 	cmsmasters_shortcodes.choice_inline_block
				} 
			}, 
			// Icon Position
			text_align : { 
				type : 		'radio', 
				title : 	cmsmasters_shortcodes.icon_field_text_align_title, 
				descr : 	cmsmasters_shortcodes.icon_field_text_align_descr, 
				def : 		'center', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'left' : 		cmsmasters_shortcodes.choice_left, 
							'center' : 		cmsmasters_shortcodes.choice_center, 
							'right' : 		cmsmasters_shortcodes.choice_right, 
				}, 
				depend : 	'display:block' 
			}, 
			// Border Width
			border_width : { 
				type : 		'range', 
				title : 	cmsmasters_shortcodes.icon_field_border_width_title, 
				descr : 	"<span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.size_note_pixel + "</span>", 
				def : 		'0', 
				required : 	true, 
				width : 	'number', 
				min : 		'0', 
				max : 		'20' 
			}, 
			// Border Radius
			border_radius : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.icon_field_border_radius_title, 
				descr : 	cmsmasters_shortcodes.icon_field_border_radius_descr + ' ' + cmsmasters_shortcodes.value_zero + ". <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.border_radius_descr_note_1 + " <br />" + cmsmasters_shortcodes.border_radius_descr_note_2 + " <a href=\"http://www.css3generator.in/border-radius.html\" target=\"_blank\">" + cmsmasters_shortcodes.border_radius_descr_note_3 + "</a>. <br />" + cmsmasters_shortcodes.border_radius_descr_note_4 + " <a href=\"http://screencast.com/t/krCXdo0NN\" target=\"_blank\">" + cmsmasters_shortcodes.border_radius_descr_note_5 + "</a>.</span>", 
				def : 		'50%', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Icon Link
			link : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.icon_field_link_title, 
				descr : 	cmsmasters_shortcodes.icon_field_link_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'full' 
			}, 
			// Icon Link Target
			target : { 
				type : 		'radio', 
				title : 	cmsmasters_shortcodes.icon_field_target_title, 
				descr : 	cmsmasters_shortcodes.icon_field_target_descr, 
				def : 		'self', 
				required : 	false, 
				width : 	'half',  
				choises : { 
							'self' : 	cmsmasters_shortcodes.link_target_choice_self, 
							'blank' : 	cmsmasters_shortcodes.link_target_choice_blank 
				}, 
				depend : 	'link:!' 
			}, 
			// Color
			color : { 
				type : 		'rgba', 
				title : 	cmsmasters_shortcodes.icon_field_color_title, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Background Color
			bg_color : { 
				type : 		'rgba', 
				title : 	cmsmasters_shortcodes.icon_field_bg_color_title, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Border Color
			bd_color : { 
				type : 		'rgba', 
				title : 	cmsmasters_shortcodes.icon_field_bd_color_title, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// CSS3 Animation
			animation : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.animation_title, 
				descr : 	cmsmasters_shortcodes.animation_descr + " <br /><span>" + cmsmasters_shortcodes.note  + ' ' + cmsmasters_shortcodes.animation_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	get_animations() 
			}, 
			// Animation Delay
			animation_delay : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.animation_delay_title, 
				descr : 	cmsmasters_shortcodes.animation_delay_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.animation_delay_descr_note + "</span>", 
				def : 		'0', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				step : 		'50' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.classes_title, 
				descr : 	cmsmasters_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	}, 
	
	
	// Icon Box
	cmsmasters_icon_box : { 
		title : 	cmsmasters_shortcodes.icon_title, 
		icon : 		'admin-icon-icon-box', 
		pair : 		true, 
		content : 	'content', 
		visual : 	'<div class="{{ data.box_type }} {{ data.box_icon }}"><h2>{{ data.title }}</h2>{{ data.content }}<div class="cl"></div><a href="javascript:void(0);" class="cmsmasters_button">{{ data.button_title }}</a></div>', 
		multiple : 	false, 
		def : 		"<p>" + cmsmasters_shortcodes.def_text + "</p>", 
		fields : { 
			// Box Type
			box_type : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.icon_field_box_icon_pos_title, 
				descr : 	'', 
				def : 		'cmsmasters_icon_heading_left', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'cmsmasters_icon_top' : 				cmsmasters_shortcodes.icon_box_choice_pos_top, 
							'cmsmasters_icon_box_top' : 			cmsmasters_shortcodes.icon_box_choice_pos_box_top, 
							'cmsmasters_icon_heading_left' : 	cmsmasters_shortcodes.icon_box_choice_pos_heading_left, 
							'cmsmasters_icon_box_left' : 		cmsmasters_shortcodes.icon_box_choice_pos_box_left, 
							'cmsmasters_icon_box_left_top' : 	cmsmasters_shortcodes.icon_box_choice_pos_box_left_top 
				} 
			}, 
			// Box Title
			title : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.icon_field_box_title_title, 
				descr : 	cmsmasters_shortcodes.icon_field_box_title_descr, 
				def : 		cmsmasters_shortcodes.icon_field_box_title_def, 
				required : 	true, 
				width : 	'half' 
			},  
			// Heading Type
			heading_type : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.heading_field_type_title, 
				descr : 	'', 
				def : 		'h1', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'h1' : 	'H1', 
							'h2' : 	'H2', 
							'h3' : 	'H3', 
							'h4' : 	'H4', 
							'h5' : 	'H5', 
							'h6' : 	'H6' 
				} 
			}, 
			// Content
			content : { 
				type : 		'editor', 
				title : 	cmsmasters_shortcodes.content, 
				descr : 	"", 
				def : 		"<p>" + cmsmasters_shortcodes.def_text + "</p>", 
				required : 	true, 
				width : 	'full' 
			}, 
			// Box Icon Type
			box_icon_type : { 
				type : 		'radio', 
				title : 	cmsmasters_shortcodes.icon_list_field_icon_type_title, 
				descr : 	cmsmasters_shortcodes.icon_list_field_icon_type_descr, 
				def : 		'icon', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'icon' : 	cmsmasters_shortcodes.icon, 
							'image' : 	cmsmasters_shortcodes.image, 
							'number' : 	cmsmasters_shortcodes.number 
				} 
			}, 
			// Box Icon
			box_icon : { 
				type : 		'icon', 
				title : 	cmsmasters_shortcodes.icon_field_box_icon_title, 
				descr : 	'', 
				def : 		'cmsmasters-icon-heart', 
				required : 	false, 
				width : 	'half', 
				choises : 	cmsmasters_composer_icons(), 
				depend : 	'box_icon_type:icon' 
			}, 
			// Box Icon Number
			box_icon_number : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.icon_box_field_icon_number_title, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				depend : 	'box_icon_type:number' 
			}, 
			// Box Icon Image
			box_icon_image : { 
				type : 			'upload', 
				title : 		cmsmasters_shortcodes.icon_box_field_icon_image_title, 
				descr : 		'', 
				def : 			'', 
				required : 		false, 
				width : 		'half', 
				frame : 		'post', 
				library : 		'image', 
				multiple : 		false, 
				description : 	false, 
				caption : 		false, 
				align : 		false, 
				link : 			false, 
				size : 			false, 
				depend : 		'box_icon_type:image' 
			}, 
			// Box Icon Size
			box_icon_size : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.icon_list_field_icon_size_title, 
				descr : 	"<span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.size_note_short + ' ' + cmsmasters_shortcodes.value_zero + "</span>", 
				def : 		'30', 
				required : 	true, 
				width : 	'number', 
				min : 		'0' 
			}, 
			// Box Icon Space
			box_icon_space : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.icon_list_field_icon_space_title, 
				descr : 	cmsmasters_shortcodes.icon_list_field_icon_space_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.icon_box_field_icon_space_descr_note + "</span>", 
				def : 		'50', 
				required : 	true, 
				width : 	'number', 
				min : 		'0' 
			}, 
			// Box Icon Border Width
			box_icon_border_width : { 
				type : 		'range', 
				title : 	cmsmasters_shortcodes.icon_box_field_icon_border_width_title, 
				descr : 	"<span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.size_note_pixel + "</span>", 
				def : 		'0', 
				required : 	true, 
				width : 	'number', 
				min : 		'0', 
				max : 		'20' 
			}, 
			// Box Icon Border Radius
			box_icon_border_radius : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.icon_box_field_icon_border_radius_title, 
				descr : 	cmsmasters_shortcodes.icon_box_field_icon_border_radius_descr + ' ' + cmsmasters_shortcodes.value_zero + ". <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.border_radius_descr_note_1 + " <br />" + cmsmasters_shortcodes.border_radius_descr_note_2 + " <a href=\"http://www.css3generator.in/border-radius.html\" target=\"_blank\">" + cmsmasters_shortcodes.border_radius_descr_note_3 + "</a>. <br />" + cmsmasters_shortcodes.border_radius_descr_note_4 + " <a href=\"http://screencast.com/t/krCXdo0NN\" target=\"_blank\">" + cmsmasters_shortcodes.border_radius_descr_note_5 + "</a>.</span>", 
				def : 		'50%', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Box Icon Color
			box_icon_color : { 
				type : 		'rgba', 
				title : 	cmsmasters_shortcodes.icon_field_box_icon_color_title, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Box Icon Background Color
			box_icon_bg_color : { 
				type : 		'rgba', 
				title : 	cmsmasters_shortcodes.icon_field_box_icon_bg_color_title, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Box Icon Border Color
			box_icon_bd_color : { 
				type : 		'rgba', 
				title : 	cmsmasters_shortcodes.icon_field_box_icon_bd_color_title, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Box Border Width
			box_border_width : { 
				type : 		'range', 
				title : 	cmsmasters_shortcodes.icon_box_field_border_width_title, 
				descr : 	"<span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.size_note_pixel + "</span>", 
				def : 		'0', 
				required : 	true, 
				width : 	'number', 
				min : 		'0', 
				max : 		'20' 
			}, 
			// Box Border Radius
			box_border_radius : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.icon_box_field_border_radius_title, 
				descr : 	cmsmasters_shortcodes.icon_box_field_border_radius_descr + ' ' + cmsmasters_shortcodes.value_zero + ". <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.border_radius_descr_note_1 + " <br />" + cmsmasters_shortcodes.border_radius_descr_note_2 + " <a href=\"http://www.css3generator.in/border-radius.html\" target=\"_blank\">" + cmsmasters_shortcodes.border_radius_descr_note_3 + "</a>. <br />" + cmsmasters_shortcodes.border_radius_descr_note_4 + " <a href=\"http://screencast.com/t/krCXdo0NN\" target=\"_blank\">" + cmsmasters_shortcodes.border_radius_descr_note_5 + "</a>.</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Box Color
			box_color : { 
				type : 		'rgba', 
				title : 	cmsmasters_shortcodes.icon_field_box_color_title, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Box Background Color
			box_bg_color : { 
				type : 		'rgba', 
				title : 	cmsmasters_shortcodes.icon_field_box_bg_color_title, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Box Border Color
			box_bd_color : { 
				type : 		'rgba', 
				title : 	cmsmasters_shortcodes.icon_field_box_bd_color_title, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Button Show
			button_show : { 
				type : 		'checkbox', 
				title : 	cmsmasters_shortcodes.button_field_show_title, 
				descr : 	cmsmasters_shortcodes.button_field_show_descr, 
				def : 		'false', 
				required : 	false, 
				width : 	'half',  
				choises : { 
							'true' : 	cmsmasters_shortcodes.choice_show 
				} 
			}, 
			// Button Title
			button_title : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.button_field_label_title, 
				descr : 	cmsmasters_shortcodes.button_field_label_descr, 
				def : 		cmsmasters_shortcodes.button, 
				required : 	false, 
				width : 	'half', 
				depend : 	'button_show:true' 
			}, 
			// Button Link
			button_link : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.button_field_link_title, 
				descr : 	cmsmasters_shortcodes.button_field_link_descr, 
				def : 		'', 
				required : 	true, 
				width : 	'half', 
				depend : 	'button_show:true' 
			}, 
			// Button Target
			button_target : { 
				type : 		'radio', 
				title : 	cmsmasters_shortcodes.button_field_target_title, 
				descr : 	cmsmasters_shortcodes.button_field_target_descr, 
				def : 		'self', 
				required : 	false, 
				width : 	'half',  
				choises : { 
							'self' : 	cmsmasters_shortcodes.link_target_choice_self, 
							'blank' : 	cmsmasters_shortcodes.link_target_choice_blank 
				}, 
				depend : 	'button_show:true' 
			}, 
			// Button Icon
			button_icon : { 
				type : 		'icon', 
				title : 	cmsmasters_shortcodes.button_field_icon_title, 
				descr : 	cmsmasters_shortcodes.button_field_icon_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	cmsmasters_composer_icons(), 
				depend : 	'button_show:true' 
			}, 
			// Button Style
			button_style : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.button_field_style_title, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'' : 									cmsmasters_shortcodes.choice_default, 
							'cmsmasters_but_bg_hover' : 					'cmsmasters_but_bg_hover', 
							'cmsmasters_but_bg_slide_left' : 			'cmsmasters_but_bg_slide_left', 
							'cmsmasters_but_bg_slide_right' : 			'cmsmasters_but_bg_slide_right', 
							'cmsmasters_but_bg_slide_top' : 				'cmsmasters_but_bg_slide_top', 
							'cmsmasters_but_bg_slide_bottom' : 			'cmsmasters_but_bg_slide_bottom', 
							'cmsmasters_but_bg_expand_vert' : 			'cmsmasters_but_bg_expand_vert', 
							'cmsmasters_but_bg_expand_hor' : 			'cmsmasters_but_bg_expand_hor', 
							'cmsmasters_but_bg_expand_diag' : 			'cmsmasters_but_bg_expand_diag', 
							'cmsmasters_but_shadow' : 					'cmsmasters_but_shadow', 
							'cmsmasters_but_icon_dark_bg' : 				'cmsmasters_but_icon_dark_bg', 
							'cmsmasters_but_icon_light_bg' : 			'cmsmasters_but_icon_light_bg', 
							'cmsmasters_but_icon_divider' : 				'cmsmasters_but_icon_divider', 
							'cmsmasters_but_icon_inverse' : 				'cmsmasters_but_icon_inverse', 
							'cmsmasters_but_icon_slide_left' : 			'cmsmasters_but_icon_slide_left', 
							'cmsmasters_but_icon_slide_right' : 			'cmsmasters_but_icon_slide_right', 
							'cmsmasters_but_icon_hover_slide_left' : 	'cmsmasters_but_icon_hover_slide_left', 
							'cmsmasters_but_icon_hover_slide_right' : 	'cmsmasters_but_icon_hover_slide_right', 
							'cmsmasters_but_icon_hover_slide_top' : 		'cmsmasters_but_icon_hover_slide_top', 
							'cmsmasters_but_icon_hover_slide_bottom' : 	'cmsmasters_but_icon_hover_slide_bottom' 
				}, 
				depend : 	'button_show:true' 
			}, 
			// Button Google Font
			button_font_family : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.button_field_label_google_font_title, 
				descr : 	cmsmasters_shortcodes.button_field_label_google_font_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.button_field_label_google_font_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	cmsmasters_composer_fonts(), 
				depend : 	'button_show:true' 
			}, 
			// Button Font Size
			button_font_size : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.button_field_label_font_size_title, 
				descr : 	cmsmasters_shortcodes.button_field_label_font_size_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.button_field_label_font_size_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				depend : 	'button_show:true' 
			}, 
			// Button Line Height
			button_line_height : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.button_field_label_line_hight_title, 
				descr : 	cmsmasters_shortcodes.button_field_label_line_height_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.button_field_label_line_height_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				depend : 	'button_show:true' 
			}, 
			// Button Font Weight
			button_font_weight : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.button_field_label_font_weight_title, 
				descr : 	cmsmasters_shortcodes.button_field_label_font_weight_descr, 
				def : 		'normal', 
				required : 	false, 
				width : 	'half', 
				choises : 	cmsmasters_composer_font_weight(), 
				depend : 	'button_show:true' 
			}, 
			// Button Font Style
			button_font_style : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.button_field_label_font_style_title, 
				descr : 	cmsmasters_shortcodes.button_field_label_font_style_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	cmsmasters_composer_font_style(), 
				depend : 	'button_show:true' 
			}, 
			// Button Left & Right Paddings
			button_padding_hor : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.button_field_paddings_title, 
				descr : 	cmsmasters_shortcodes.button_field_paddings_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.button_field_paddings_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				depend : 	'button_show:true' 
			}, 
			// Button Border Width
			button_border_width : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.button_field_border_width_title, 
				descr : 	cmsmasters_shortcodes.button_field_border_width_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.size_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				max : 		'20', 
				depend : 	'button_show:true' 
			}, 
			// Button Border Style
			button_border_style : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.button_field_border_style_title, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'solid' : 	cmsmasters_shortcodes.choice_solid, 
							'dotted' : 	cmsmasters_shortcodes.choice_dotted, 
							'dashed' : 	cmsmasters_shortcodes.choice_dashed, 
							'double' : 	cmsmasters_shortcodes.choice_double, 
							'groove' : 	cmsmasters_shortcodes.choice_groove, 
							'ridge' : 	cmsmasters_shortcodes.choice_ridge, 
							'inset' : 	cmsmasters_shortcodes.choice_inset, 
							'outset' : 	cmsmasters_shortcodes.choice_outset 
				}, 
				depend : 	'button_show:true' 
			}, 
			// Button Border Radius
			button_border_radius : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.button_field_border_radius_title, 
				descr : 	cmsmasters_shortcodes.button_field_border_radius_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.border_radius_descr_note_1 + " <br />" + cmsmasters_shortcodes.border_radius_descr_note_2 + " <a href=\"http://www.css3generator.in/border-radius.html\" target=\"_blank\">" + cmsmasters_shortcodes.border_radius_descr_note_3 + "</a>. <br />" + cmsmasters_shortcodes.border_radius_descr_note_4 + " <a href=\"http://screencast.com/t/krCXdo0NN\" target=\"_blank\">" + cmsmasters_shortcodes.border_radius_descr_note_5 + "</a>.</span>", 
				def : 		'', 
				required : 	false, 
				depend : 	'button_show:true' 
			}, 
			// Button Background Color
			button_bg_color : { 
				type : 		'rgba', 
				title : 	cmsmasters_shortcodes.button_field_bg_color_title, 
				descr : 	cmsmasters_shortcodes.button_field_bg_color_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.clear_color_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				depend : 	'button_show:true' 
			}, 
			// Button Text Color
			button_text_color : { 
				type : 		'rgba', 
				title : 	cmsmasters_shortcodes.button_field_txt_color_title, 
				descr : 	cmsmasters_shortcodes.button_field_txt_color_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.clear_color_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				depend : 	'button_show:true' 
			}, 
			// Button Border Color
			button_border_color : { 
				type : 		'rgba', 
				title : 	cmsmasters_shortcodes.button_field_bd_color_title, 
				descr : 	cmsmasters_shortcodes.button_field_bd_color_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.clear_color_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				depend : 	'button_show:true' 
			}, 
			// Button Background Color on Mouseover
			button_bg_color_h : { 
				type : 		'rgba', 
				title : 	cmsmasters_shortcodes.button_field_bg_color_h_title, 
				descr : 	cmsmasters_shortcodes.button_field_bg_color_h_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.clear_color_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				depend : 	'button_show:true' 
			}, 
			// Button Text Color on Mouseover
			button_text_color_h : { 
				type : 		'rgba', 
				title : 	cmsmasters_shortcodes.button_field_txt_color_h_title, 
				descr : 	cmsmasters_shortcodes.button_field_txt_color_h_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.clear_color_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				depend : 	'button_show:true' 
			}, 
			// Button Border Color on Mouseover
			button_border_color_h : { 
				type : 		'rgba', 
				title : 	cmsmasters_shortcodes.button_field_bd_color_h_title, 
				descr : 	cmsmasters_shortcodes.button_field_bd_color_h_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.clear_color_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				depend : 	'button_show:true' 
			}, 
			// CSS3 Animation
			animation : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.animation_title, 
				descr : 	cmsmasters_shortcodes.animation_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.animation_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	get_animations() 
			}, 
			// Animation Delay
			animation_delay : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.animation_delay_title, 
				descr : 	cmsmasters_shortcodes.animation_delay_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.animation_delay_descr_note + "</span>", 
				def : 		'0', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				step : 		'50' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.classes_title, 
				descr : 	cmsmasters_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	}, 
	
	
	// Icon List
	cmsmasters_icon_list_items : { 
		title : 	cmsmasters_shortcodes.icon_list_title, 
		icon : 		'admin-icon-list', 
		pair : 		true, 
		content : 	'list', 
		visual : 	false, 
		multiple : 	true, 
		def : 		'[cmsmasters_icon_list_item title="' + cmsmasters_shortcodes.title + '"]<p>' + cmsmasters_shortcodes.def_text + '</p>[/cmsmasters_icon_list_item]', 
		fields : { 
			// Icon List
			list : { 
				type : 		'multiple', 
				title : 	cmsmasters_shortcodes.icon_list_title, 
				descr : 	cmsmasters_shortcodes.icon_list_field_icon_list_descr, 
				def : 		'[cmsmasters_icon_list_item title="' + cmsmasters_shortcodes.title + '"]<p>' + cmsmasters_shortcodes.def_text + '</p>[/cmsmasters_icon_list_item]', 
				required : 	true, 
				width : 	'half' 
			}, 
			// List Type
			type : { 
				type : 		'radio', 
				title : 	cmsmasters_shortcodes.icon_list_field_list_type_title, 
				descr : 	cmsmasters_shortcodes.icon_list_field_list_type_descr, 
				def : 		'block', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'block' : 	cmsmasters_shortcodes.icon_list_field_list_type_choice_block, 
							'list' : 	cmsmasters_shortcodes.icon_list_field_list_type_choice_list 
				} 
			}, 
			// Icon Type
			icon_type : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.icon_list_field_icon_type_title, 
				descr : 	cmsmasters_shortcodes.icon_list_field_icon_type_descr, 
				def : 		'icon', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'icon' : 					cmsmasters_shortcodes.icon, 
							'image' : 					cmsmasters_shortcodes.image, 
							'decimal' : 				cmsmasters_shortcodes.choice_decimal, 
							'decimal-leading-zero' : 	cmsmasters_shortcodes.choice_decimal_zero, 
							'lower-roman' : 			cmsmasters_shortcodes.choice_l_roman, 
							'upper-roman' : 			cmsmasters_shortcodes.choice_u_roman, 
							'lower-greek' : 			cmsmasters_shortcodes.choice_l_greek, 
							'lower-latin' : 			cmsmasters_shortcodes.choice_l_latin, 
							'upper-latin' : 			cmsmasters_shortcodes.choice_u_latin 
				}, 
				depend : 	'type:block' 
			}, 
			// Default Icon
			icon : { 
				type : 		'icon', 
				title : 	'Default Icon', 
				descr : 	"Choose default icon for your icon list", 
				def : 		'cmsmasters-icon-thumbs-up', 
				required : 	true, 
				width : 	'half', 
				choises : 	cmsmasters_composer_icons() 
			}, 
			// Icon Size
			icon_size : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.icon_list_field_icon_size_title, 
				descr : 	"<span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.size_note_short + ' ' + cmsmasters_shortcodes.value_zero + "</span>", 
				def : 		'30', 
				required : 	true, 
				width : 	'number', 
				min : 		'0' 
			}, 
			// Heading Type
			heading : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.heading_field_type_title, 
				descr : 	"</span>", 
				def : 		'h4', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'h1' : 	'H1', 
							'h2' : 	'H2', 
							'h3' : 	'H3', 
							'h4' : 	'H4', 
							'h5' : 	'H5', 
							'h6' : 	'H6' 
				}, 
				depend : 	'type:block' 
			}, 
			// Icon Space
			icon_space : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.icon_list_field_icon_space_title, 
				descr : 	cmsmasters_shortcodes.icon_list_field_icon_space_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.icon_list_field_icon_space_descr_note + "</span>", 
				def : 		'100', 
				required : 	true, 
				width : 	'number', 
				min : 		'0', 
				depend : 	'type:block' 
			}, 
			// List Items Color Type
			items_color_type : { 
				type : 		'radio', 
				title : 	cmsmasters_shortcodes.icon_list_field_items_color_title, 
				descr : 	cmsmasters_shortcodes.icon_list_field_items_color_descr, 
				def : 		'border', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'border' : 	cmsmasters_shortcodes.icon_list_field_items_color_choice_border, 
							'bg' : 		cmsmasters_shortcodes.icon_list_field_items_color_choice_bg, 
							'icon' : 	cmsmasters_shortcodes.icon_list_field_items_color_choice_icon 
				}, 
				depend : 	'type:block' 
			}, 
			// Border Width
			border_width : { 
				type : 		'range', 
				title : 	cmsmasters_shortcodes.icon_list_field_border_width_title, 
				descr : 	cmsmasters_shortcodes.icon_list_field_border_width_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.size_note + "</span>", 
				def : 		'10', 
				required : 	true, 
				width : 	'number', 
				min : 		'0', 
				max : 		'20', 
				depend : 	'type:block' 
			}, 
			// Border Radius
			border_radius : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.icon_list_field_border_radius_title, 
				descr : 	cmsmasters_shortcodes.icon_list_field_border_radius_descr + ' ' + cmsmasters_shortcodes.value_zero + ". <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.border_radius_descr_note_1 + " <br />" + cmsmasters_shortcodes.border_radius_descr_note_2 + " <a href=\"http://www.css3generator.in/border-radius.html\" target=\"_blank\">" + cmsmasters_shortcodes.border_radius_descr_note_3 + "</a>. <br />" + cmsmasters_shortcodes.border_radius_descr_note_4 + " <a href=\"http://screencast.com/t/krCXdo0NN\" target=\"_blank\">" + cmsmasters_shortcodes.border_radius_descr_note_5 + "</a>.</span>", 
				def : 		'50%', 
				required : 	false, 
				width : 	'half', 
				depend : 	'type:block' 
			}, 
			// List Items Unifier Width
			unifier_width : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.icon_list_field_items_unifier_title, 
				descr : 	cmsmasters_shortcodes.icon_list_field_items_unifier_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.size_note_short + ' ' + cmsmasters_shortcodes.value_zero + "</span>", 
				def : 		'1', 
				required : 	true, 
				width : 	'number', 
				min : 		'0', 
				max : 		'20', 
				depend : 	'type:block' 
			}, 
			// Icon Position
			position : { 
				type : 		'radio', 
				title : 	cmsmasters_shortcodes.icon_list_field_icon_position_title, 
				descr : 	cmsmasters_shortcodes.icon_list_field_icon_position_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.icon_list_field_icon_position_descr_note + "</span>", 
				def : 		'left', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'left' : 	cmsmasters_shortcodes.position_choice_left_side, 
							'right' : 	cmsmasters_shortcodes.position_choice_right_side 
				}, 
				depend : 	'type:block' 
			}, 
			// List Item Height
			item_height : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.icon_list_field_item_height_title, 
				descr : 	cmsmasters_shortcodes.icon_list_field_item_height_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.icon_list_field_item_height_descr_note + "</span>", 
				def : 		'', 
				required : 	true, 
				width : 	'number', 
				min : 		'0', 
				depend : 	'type:list' 
			}, 
			// CSS3 Animation
			animation : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.animation_title, 
				descr : 	cmsmasters_shortcodes.animation_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.animation_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	get_animations() 
			}, 
			// Animation Delay
			animation_delay : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.animation_delay_title, 
				descr : 	cmsmasters_shortcodes.animation_delay_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.animation_delay_descr_note + "</span>", 
				def : 		'0', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				step : 		'50' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.classes_title, 
				descr : 	cmsmasters_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	}, 
	
	
	// Image
	cmsmasters_image : { 
		title : 	cmsmasters_shortcodes.image_title, 
		icon : 		'admin-icon-image', 
		pair : 		true, 
		content : 	'image', 
		visual : 	'<div><img src="{{ data.image }}" alt="" class="{{ data.align }}" /></div>', 
		multiple : 	false, 
		def : 		cmsmasters_shortcodes.theme_url + '/framework/admin/inc/img/image.png', 
		fields : { 
			// Image
			image : { 
				type : 			'upload', 
				title : 		cmsmasters_shortcodes.image_title, 
				descr : 		'', 
				def : 			cmsmasters_shortcodes.theme_url + '/framework/admin/inc/img/image.png', 
				required : 		true, 
				width : 		'half', 
				frame : 		'post', 
				library : 		'image', 
				multiple : 		false, 
				description : 	false, 
				caption : 		true, 
				align : 		true, 
				link : 			true, 
				size : 			true 
			}, 
			// Image Align
			align : { 
				type : 		'radio', 
				title : 	cmsmasters_shortcodes.image_field_image_align_title, 
				descr : 	'', 
				def : 		'center', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'left' : 	cmsmasters_shortcodes.choice_left, 
							'center' : 	cmsmasters_shortcodes.choice_center, 
							'right' : 	cmsmasters_shortcodes.choice_right, 
							'none' : 	cmsmasters_shortcodes.image_field_image_align_choice_none
				}
			}, 
			// Caption
			caption : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.image_field_caption_title, 
				descr : 	"<span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.image_field_caption_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Image Link
			link : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.image_field_image_link_title, 
				descr : 	"<span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.image_field_image_link_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Link Target
			target : { 
				type : 		'checkbox', 
				title : 	cmsmasters_shortcodes.link_target, 
				descr : 	cmsmasters_shortcodes.image_field_link_target_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'true' : 	cmsmasters_shortcodes.choice_enable 
				}, 
				depend : 	'link:!' 
			}, 
			// Lightbox
			lightbox : { 
				type : 		'checkbox', 
				title : 	cmsmasters_shortcodes.image_field_link_lightbox_title, 
				descr : 	cmsmasters_shortcodes.image_field_link_lightbox_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'true' : 	cmsmasters_shortcodes.choice_enable 
				}, 
				depend : 	'link:!' 
			}, 
			// CSS3 Animation
			animation : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.animation_title, 
				descr : 	cmsmasters_shortcodes.animation_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.animation_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	get_animations() 
			}, 
			// Animation Delay
			animation_delay : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.animation_delay_title, 
				descr : 	cmsmasters_shortcodes.animation_delay_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.animation_delay_descr_note + "</span>", 
				def : 		'0', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				step : 		'50' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.classes_title, 
				descr : 	cmsmasters_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	}, 
	
	
	// Notice
	cmsmasters_notice : { 
		title : 	cmsmasters_shortcodes.notice_title, 
		icon : 		'admin-icon-notice', 
		pair : 		true, 
		content : 	'content', 
		visual : 	'<div class="{{ data.type }} {{ data.icon }} {{ data.close }}">{{ data.content }}</div>', 
		multiple : 	false, 
		def : 		"<p>" + cmsmasters_shortcodes.def_text + "</p>", 
		fields : { 
			// Content
			content : { 
				type : 		'editor', 
				title : 	cmsmasters_shortcodes.notice_field_content_title, 
				descr : 	"", 
				def : 		"<p>" + cmsmasters_shortcodes.def_text + "</p>", 
				required : 	true, 
				width : 	'full' 
			}, 
			// Notice Type
			type : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.notice_field_notice_type_title, 
				descr : 	'', 
				def : 		'cmsmasters_notice_success', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'cmsmasters_notice_success' : 	cmsmasters_shortcodes.notice_field_notice_type_choice_success, 
							'cmsmasters_notice_error' : 		cmsmasters_shortcodes.notice_field_notice_type_choice_error, 
							'cmsmasters_notice_info' : 		cmsmasters_shortcodes.notice_field_notice_type_choice_info, 
							'cmsmasters_notice_warning' : 	cmsmasters_shortcodes.notice_field_notice_type_choice_warning, 
							'cmsmasters_notice_download' : 	cmsmasters_shortcodes.notice_field_notice_type_choice_download, 
							'cmsmasters_notice_custom' : 	cmsmasters_shortcodes.notice_field_notice_type_choice_custom 
				} 
			}, 
			// Background Color
			bg_color : { 
				type : 		'rgba', 
				title : 	cmsmasters_shortcodes.background_color, 
				descr : 	cmsmasters_shortcodes.notice_field_bg_color_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				depend : 	'type:cmsmasters_notice_custom' 
			}, 
			// Border Color
			bd_color : { 
				type : 		'rgba', 
				title : 	cmsmasters_shortcodes.notice_field_border_color_title, 
				descr : 	cmsmasters_shortcodes.notice_field_border_color_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				depend : 	'type:cmsmasters_notice_custom' 
			}, 
			// Text Color
			color : { 
				type : 		'rgba', 
				title : 	cmsmasters_shortcodes.notice_field_txt_color_title, 
				descr : 	cmsmasters_shortcodes.notice_field_txt_color_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				depend : 	'type:cmsmasters_notice_custom' 
			}, 
			// Close Button
			close : { 
				type : 		'checkbox', 
				title : 	cmsmasters_shortcodes.notice_field_close_button_title, 
				descr : 	'', 
				def : 		'true', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'true' : 	'Show' 
				} 
			}, 
			// Notice Icon
			icon : { 
				type : 		'icon', 
				title : 	cmsmasters_shortcodes.notice_field_notice_icon_title, 
				descr : 	'', 
				def : 		'cmsmasters-icon-check-1', 
				required : 	false, 
				width : 	'full', 
				choises : 	cmsmasters_composer_icons() 
			}, 
			// CSS3 Animation
			animation : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.animation_title, 
				descr : 	cmsmasters_shortcodes.animation_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.animation_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	get_animations() 
			}, 
			// Animation Delay
			animation_delay : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.animation_delay_title, 
				descr : 	cmsmasters_shortcodes.animation_delay_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.animation_delay_descr_note + "</span>", 
				def : 		'0', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				step : 		'50' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.classes_title, 
				descr : 	cmsmasters_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	}, 
	
	
	// Portfolio
	cmsmasters_portfolio : { 
		title : 	cmsmasters_shortcodes.portfolio_title, 
		icon : 		'admin-icon-portfolio', 
		pair : 		false, 
		content : 	false, 
		visual : 	false, 
		multiple : 	false, 
		def : 		'', 
		fields : { 
			// Order By
			orderby : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.orderby_title, 
				descr : 	cmsmasters_shortcodes.portfolio_field_orderby_descr, 
				def : 		'date', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'date' : 		cmsmasters_shortcodes.choice_date, 
							'name' : 		cmsmasters_shortcodes.name, 
							'id' : 			cmsmasters_shortcodes.choice_id, 
							'menu_order' : 	cmsmasters_shortcodes.choice_menu, 
							'popular' : 	cmsmasters_shortcodes.choice_popular 
				} 
			}, 
			// Order
			order : { 
				type : 		'radio', 
				title : 	cmsmasters_shortcodes.order_title, 
				descr : 	cmsmasters_shortcodes.order_descr, 
				def : 		'DESC', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'ASC' : 	cmsmasters_shortcodes.choice_asc, 
							'DESC' : 	cmsmasters_shortcodes.choice_desc
				} 
			}, 
			// Projects Number
			count : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.portfolio_field_pj_number_title, 
				descr : 	cmsmasters_shortcodes.portfolio_field_pj_number_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.portfolio_field_pj_number_descr_note + "</span>", 
				def : 		'10', 
				required : 	false, 
				width : 	'number', 
				min : 		'1' 
			}, 
			// Categories
			categories : { 
				type : 		'select_multiple', 
				title : 	cmsmasters_shortcodes.categories, 
				descr : 	cmsmasters_shortcodes.portfolio_field_categories_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.portfolio_field_categories_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	cmsmasters_composer_pj_categories() 
			}, 
			// Layout
			layout : { 
				type : 		'radio', 
				title : 	cmsmasters_shortcodes.layout, 
				descr : 	cmsmasters_shortcodes.portfolio_field_layout_descr, 
				def : 		'grid', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'grid' : 	cmsmasters_shortcodes.portfolio_field_layout_choice_grid, 
							'puzzle' : 	cmsmasters_shortcodes.portfolio_field_layout_choice_puzzle 
				} 
			}, 
			// Layout Mode
			layout_mode : { 
				type : 		'radio', 
				title : 	cmsmasters_shortcodes.layout_mode, 
				descr : 	cmsmasters_shortcodes.portfolio_field_layout_mode_descr, 
				def : 		'perfect', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'perfect' : 	cmsmasters_shortcodes.portfolio_field_layout_mode_choice_perfect, 
							'masonry' : 	cmsmasters_shortcodes.portfolio_field_layout_mode_choice_masonry 
				}, 
				depend : 	'layout:grid' 
			}, 
			// Columns Count
			columns : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.columns_count, 
				descr : 	cmsmasters_shortcodes.portfolio_field_col_count_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.portfolio_field_col_count_descr_note + "<br />" + cmsmasters_shortcodes.portfolio_field_col_count_descr_note_custom + "</span>", 
				def : 		'4', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'1' : 	'1', 
							'2' : 	'2', 
							'3' : 	'3', 
							'4' : 	'4', 
							'5' : 	'5' 
				}, 
				depend : 	'layout:grid' 
			}, 
			// Metadata Grid
			metadata_grid : { 
				type : 		'checkbox', 
				title : 	cmsmasters_shortcodes.metadata, 
				descr : 	cmsmasters_shortcodes.portfolio_field_metadata_descr, 
				def : 		'title,categories,rollover', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'title' : 		cmsmasters_shortcodes.choice_title, 
							'excerpt' : 	cmsmasters_shortcodes.choice_excerpt, 
							'categories' : 	cmsmasters_shortcodes.choice_categories, 
							'comments' : 	cmsmasters_shortcodes.choice_comments, 
							'likes' : 		cmsmasters_shortcodes.choice_likes, 
							'rollover' : 	cmsmasters_shortcodes.choice_rollover 
				}, 
				depend : 	'layout:grid' 
			}, 
			// Metadata Puzzle
			metadata_puzzle : { 
				type : 		'checkbox', 
				title : 	cmsmasters_shortcodes.metadata, 
				descr : 	cmsmasters_shortcodes.portfolio_field_metadata_descr, 
				def : 		'title,categories,rollover', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'title' : 		cmsmasters_shortcodes.choice_title, 
							'categories' : 	cmsmasters_shortcodes.choice_categories, 
							'comments' : 	cmsmasters_shortcodes.choice_comments, 
							'likes' : 		cmsmasters_shortcodes.choice_likes, 
							'rollover' : 	cmsmasters_shortcodes.choice_rollover 
				}, 
				depend : 	'layout:puzzle' 
			}, 
			// Gap
			gap : { 
				type : 		'radio', 
				title : 	cmsmasters_shortcodes.portfolio_field_gap_title, 
				descr : 	cmsmasters_shortcodes.portfolio_field_gap_descr, 
				def : 		'large', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'large' : 	cmsmasters_shortcodes.portfolio_field_gap_choice_large, 
							'small' : 	cmsmasters_shortcodes.portfolio_field_gap_choice_small, 
							'zero' : 	cmsmasters_shortcodes.portfolio_field_gap_choice_zero 
				} 
			}, 
			// Filter
			filter : { 
				type : 		'checkbox', 
				title : 	cmsmasters_shortcodes.filter, 
				descr : 	cmsmasters_shortcodes.portfolio_field_filter_descr, 
				def : 		'true', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'true' : 	cmsmasters_shortcodes.choice_enable 
				} 
			}, 
			// Filter Button Text
			filter_text : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.filter_text_title, 
				descr : 	cmsmasters_shortcodes.filter_text_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.filter_text_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				depend : 	'filter:true' 
			}, 
			// Filter 'All Categories' Text
			filter_cats_text : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.filter_cats_text_title, 
				descr : 	cmsmasters_shortcodes.filter_cats_text_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.filter_cats_text_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				depend : 	'filter:true' 
			}, 
			// Sorting
			sorting : { 
				type : 		'checkbox', 
				title : 	cmsmasters_shortcodes.portfolio_field_sorting_title, 
				descr : 	cmsmasters_shortcodes.portfolio_field_sorting_descr, 
				def : 		'true', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'true' : 	cmsmasters_shortcodes.choice_enable 
				}, 
				depend : 	'layout:grid' 
			}, 
			// Sorting By Name Button Text
			sorting_name_text : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.sorting_name_text_title, 
				descr : 	cmsmasters_shortcodes.sorting_name_text_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.sorting_name_text_descr_note + ". <br />" + cmsmasters_shortcodes.sorting_enabled_text_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				depend : 	'layout:grid' 
			}, 
			// Sorting By Date Button Text
			sorting_date_text : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.sorting_date_text_title, 
				descr : 	cmsmasters_shortcodes.sorting_date_text_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.sorting_date_text_descr_note + ". <br />" + cmsmasters_shortcodes.sorting_enabled_text_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				depend : 	'layout:grid' 
			}, 
			// Pagination
			pagination : { 
				type : 		'radio', 
				title : 	cmsmasters_shortcodes.pagination_title, 
				descr : 	cmsmasters_shortcodes.pagination_descr, 
				def : 		'pagination', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'pagination' : 	cmsmasters_shortcodes.pagination_choice_pagination, 
							'more' : 		cmsmasters_shortcodes.pagination_choice_more, 
							'disabled' : 	cmsmasters_shortcodes.pagination_choice_disabled 
				} 
			}, 
			// 'Load More' Button Text
			more_text : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.pagination_more_text_title, 
				descr : 	cmsmasters_shortcodes.pagination_more_text_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.pagination_more_text_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				depend : 	'pagination:more' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.classes_title, 
				descr : 	cmsmasters_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	}, 
	
	
	// Posts Slider
	cmsmasters_posts_slider : { 
		title : 	cmsmasters_shortcodes.posts_slider_title, 
		icon : 		'admin-icon-post-slider', 
		pair : 		false, 
		content : 	false, 
		visual : 	false, 
		multiple : 	false, 
		def : 		'', 
		fields : { 
			// Order By
			orderby : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.orderby_title, 
				descr : 	cmsmasters_shortcodes.posts_slider_field_orderby_descr, 
				def : 		'date', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'date' : 		cmsmasters_shortcodes.choice_date, 
							'name' : 		cmsmasters_shortcodes.name, 
							'id' : 			cmsmasters_shortcodes.choice_id, 
							'menu_order' : 	cmsmasters_shortcodes.choice_menu, 
							'popular' : 	cmsmasters_shortcodes.choice_popular, 
							'rand' : 		cmsmasters_shortcodes.choice_rand 
				} 
			}, 
			// Order
			order : { 
				type : 		'radio', 
				title : 	cmsmasters_shortcodes.order_title, 
				descr : 	cmsmasters_shortcodes.order_descr, 
				def : 		'DESC', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'ASC' : 	cmsmasters_shortcodes.choice_asc, 
							'DESC' : 	cmsmasters_shortcodes.choice_desc 
				} 
			}, 
			// Posts Type
			post_type : { 
				type : 		'radio', 
				title : 	cmsmasters_shortcodes.posts_slider_field_poststype_title, 
				descr : 	'', 
				def : 		'post', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'post' : 		cmsmasters_shortcodes.posts_slider_field_poststype_choice_post, 
							'project' : 	cmsmasters_shortcodes.posts_slider_field_poststype_choice_project 
				} 
			}, 
			// Posts Categories
			blog_categories : { 
				type : 		'select_multiple', 
				title : 	cmsmasters_shortcodes.posts_slider_field_postscateg_title, 
				descr : 	cmsmasters_shortcodes.posts_slider_field_postscateg_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.posts_slider_field_postscateg_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	cmsmasters_composer_categories(), 
				depend : 	'post_type:post' 
			}, 
			// Projects Categories
			portfolio_categories : { 
				type : 		'select_multiple', 
				title : 	cmsmasters_shortcodes.posts_slider_field_pjcateg_title, 
				descr : 	cmsmasters_shortcodes.posts_slider_field_pjcateg_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.posts_slider_field_pjcateg_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	cmsmasters_composer_pj_categories(), 
				depend : 	'post_type:project' 
			}, 
			// Columns Count
			columns : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.columns_count, 
				descr : 	cmsmasters_shortcodes.posts_slider_field_col_count_descr, 
				def : 		'4', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'1' : 	'1', 
							'2' : 	'2', 
							'3' : 	'3', 
							'4' : 	'4' 
				}, 
				depend : 	'post_type:project' 
			}, 
			// Posts Amount
			amount : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.posts_slider_field_postsamount_title, 
				descr : 	cmsmasters_shortcodes.posts_slider_field_postsamount_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.posts_slider_field_postsamount_descr_note + "</span>", 
				def : 		'1', 
				required : 	false, 
				width : 	'number', 
				min : 		'1', 
				depend : 	'post_type:post' 
			}, 
			// Posts Number
			count : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.posts_slider_field_postsnumber_title, 
				descr : 	"<span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.posts_slider_field_postsnumber_descr_note + "</span>", 
				def : 		'12', 
				required : 	false, 
				width : 	'number', 
				min : 		'1' 
			}, 
			// Pause Time
			pause : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.pause_time, 
				descr : 	cmsmasters_shortcodes.posts_slider_field_pausetime_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.autoslide_def + "</span>", 
				def : 		'5', 
				required : 	false, 
				width : 	'number', 
				min : 		'0' 
			}, 
			// Posts Metadata
			blog_metadata : { 
				type : 		'checkbox', 
				title : 	cmsmasters_shortcodes.posts_slider_field_postsmeta_title, 
				descr : 	cmsmasters_shortcodes.posts_slider_field_postsmeta_descr, 
				def : 		'title,date,categories,comments,likes,more', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'title' : 		cmsmasters_shortcodes.choice_title, 
							'excerpt' : 	cmsmasters_shortcodes.choice_excerpt, 
							'date' : 		cmsmasters_shortcodes.choice_date, 
							'categories' : 	cmsmasters_shortcodes.choice_categories, 
							'author' : 		cmsmasters_shortcodes.choice_author, 
							'comments' : 	cmsmasters_shortcodes.choice_comments, 
							'likes' : 		cmsmasters_shortcodes.choice_likes, 
							'more' : 		cmsmasters_shortcodes.choice_more 
				}, 
				depend : 	'post_type:post' 
			}, 
			// Projects Metadata
			portfolio_metadata : { 
				type : 		'checkbox', 
				title : 	cmsmasters_shortcodes.posts_slider_field_pjmeta_title, 
				descr : 	cmsmasters_shortcodes.posts_slider_field_pjmeta_descr, 
				def : 		'title,categories,likes', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'title' : 		cmsmasters_shortcodes.choice_title, 
							'excerpt' : 	cmsmasters_shortcodes.choice_excerpt, 
							'categories' : 	cmsmasters_shortcodes.choice_categories, 
							'comments' : 	cmsmasters_shortcodes.choice_comments, 
							'likes' : 		cmsmasters_shortcodes.choice_likes 
				}, 
				depend : 	'post_type:project' 
			}, 
			// CSS3 Animation
			animation : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.animation_title, 
				descr : 	cmsmasters_shortcodes.animation_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.animation_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	get_animations() 
			}, 
			// Animation Delay
			animation_delay : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.animation_delay_title, 
				descr : 	cmsmasters_shortcodes.animation_delay_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.animation_delay_descr_note + "</span>", 
				def : 		'0', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				step : 		'50' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.classes_title, 
				descr : 	cmsmasters_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	}, 
	
	
	// Pricing Table Items
	cmsmasters_pricing_table_items : { 
		title : 	cmsmasters_shortcodes.pricing_title, 
		icon : 		'admin-icon-price', 
		pair : 		true, 
		content : 	'offers', 
		visual : 	false, 
		multiple : 	true, 
		def : 		'[cmsmasters_pricing_table_item currency="$" price="99"]' + cmsmasters_shortcodes.title + '[/cmsmasters_pricing_table_item]', 
		fields : { 
			// Offers
			offers : { 
				type : 		'multiple', 
				title : 	cmsmasters_shortcodes.pricing_field_offers_title, 
				descr : 	cmsmasters_shortcodes.pricing_field_offers_descr, 
				def : 		'[cmsmasters_pricing_table_item currency="$" price="99"]' + cmsmasters_shortcodes.title + '[/cmsmasters_pricing_table_item]', 
				required : 	true, 
				width : 	'half' 
			}, 
			// Columns Count
			columns : { 
				type : 		'select',   
				title : 	cmsmasters_shortcodes.columns_count, 
				descr : 	cmsmasters_shortcodes.pricing_field_col_count_descr, 
				def : 		'4', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'1' : 	'1', 
							'2' : 	'2', 
							'3' : 	'3', 
							'4' : 	'4' 
				} 
			}, 
			// CSS3 Animation
			animation : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.animation_title, 
				descr : 	cmsmasters_shortcodes.animation_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.animation_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	get_animations() 
			}, 
			// Animation Delay
			animation_delay : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.animation_delay_title, 
				descr : 	cmsmasters_shortcodes.animation_delay_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.animation_delay_descr_note + "</span>", 
				def : 		'0', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				step : 		'50' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.classes_title, 
				descr : 	cmsmasters_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	}, 
	
	
	// Profiles
	cmsmasters_profiles : { 
		title : 	cmsmasters_shortcodes.profiles_title, 
		icon : 		'admin-icon-profiles', 
		pair : 		false, 
		content : 	false, 
		visual : 	false, 
		multiple : 	false, 
		def : 		'', 
		fields : { 
			// Order By
			orderby : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.orderby_title, 
				descr : 	cmsmasters_shortcodes.profiles_field_orderby_descr, 
				def : 		'date', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'date' : 		cmsmasters_shortcodes.choice_date, 
							'name' : 		cmsmasters_shortcodes.name, 
							'id' : 			cmsmasters_shortcodes.choice_id, 
							'menu_order' : 	cmsmasters_shortcodes.choice_menu, 
							'rand' : 		cmsmasters_shortcodes.choice_rand 
				} 
			}, 
			// Order
			order : { 
				type : 		'radio', 
				title : 	cmsmasters_shortcodes.order_title, 
				descr : 	cmsmasters_shortcodes.order_descr, 
				def : 		'DESC', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'ASC' : 	cmsmasters_shortcodes.choice_asc, 
							'DESC' : 	cmsmasters_shortcodes.choice_desc
				} 
			}, 
			// Profiles Number
			count : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.profiles_field_profiles_number_title, 
				descr : 	"<span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.profiles_field_profiles_number_descr_note + "</span>", 
				def : 		'4', 
				required : 	false, 
				width : 	'number', 
				min : 		'1' 
			}, 
			// Categories
			categories : { 
				type : 		'select_multiple', 
				title : 	cmsmasters_shortcodes.categories, 
				descr : 	cmsmasters_shortcodes.profiles_field_categories_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.profiles_field_categories_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	cmsmasters_composer_pl_categories() 
			}, 
			// Layout
			layout : { 
				type : 		'radio', 
				title : 	cmsmasters_shortcodes.layout, 
				descr : 	'', 
				def : 		'vertical', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'vertical' : 	cmsmasters_shortcodes.choice_vertical, 
							'horizontal' : 	cmsmasters_shortcodes.choice_horizontal 
				} 
			}, 
			// Columns Count
			columns : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.columns_count, 
				descr : 	cmsmasters_shortcodes.profiles_field_col_count_descr, 
				def : 		'4', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'1' : 	'1', 
							'2' : 	'2', 
							'3' : 	'3', 
							'4' : 	'4' 
				}, 
				depend : 	'layout:horizontal' 
			}, 
			// CSS3 Animation
			animation : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.animation_title, 
				descr : 	cmsmasters_shortcodes.animation_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.animation_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	get_animations() 
			}, 
			// Animation Delay
			animation_delay : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.animation_delay_title, 
				descr : 	cmsmasters_shortcodes.animation_delay_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.animation_delay_descr_note + "</span>", 
				def : 		'0', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				step : 		'50' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.classes_title, 
				descr : 	cmsmasters_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	}, 
	
	
	// Progress Bars
	cmsmasters_stats : { 
		title : 	cmsmasters_shortcodes.prog_bars_title, 
		icon : 		'admin-icon-stats', 
		pair : 		true, 
		content : 	'stats', 
		visual : 	false, 
		multiple : 	true, 
		def : 		'[cmsmasters_stat progress="50"]' + cmsmasters_shortcodes.title + '[/cmsmasters_stat]', 
		fields : { 
			// Progress Bars
			stats : { 
				type : 		'multiple', 
				title : 	cmsmasters_shortcodes.prog_bars_title, 
				descr : 	cmsmasters_shortcodes.prog_bars_field_prog_bars_descr, 
				def : 		'[cmsmasters_stat progress="50"]' + cmsmasters_shortcodes.title + '[/cmsmasters_stat]', 
				required : 	true, 
				width : 	'half' 
			}, 
			// Mode
			mode : { 
				type : 		'radio', 
				title : 	cmsmasters_shortcodes.mode, 
				descr : 	cmsmasters_shortcodes.prog_bars_field_mode_descr, 
				def : 		'bars', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'bars' : 		cmsmasters_shortcodes.prog_bars_field_mode_choice_bars, 
							'circles' : 	cmsmasters_shortcodes.prog_bars_field_mode_choice_circles 
				} 
			}, 
			// Type
			type : { 
				type : 		'radio', 
				title : 	cmsmasters_shortcodes.prog_bars_field_type_title, 
				descr : 	'', 
				def : 		'horizontal', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'horizontal' : 	cmsmasters_shortcodes.choice_icon_side, 
							'vertical' : 	cmsmasters_shortcodes.choice_icon_top 
				}, 
				depend : 	'mode:bars' 
			}, 
			// Number per Row
			count : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.prog_bars_field_number_per_row_title, 
				descr : 	"<span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.prog_bars_field_number_per_row_descr_note + "</span>", 
				def : 		'5', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'5' : 	'5', 
							'4' : 	'4', 
							'3' : 	'3', 
							'2' : 	'2', 
							'1' : 	'1' 
				} 
			}, 
			// CSS3 Animation
			animation : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.animation_title, 
				descr : 	cmsmasters_shortcodes.animation_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.animation_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	get_animations() 
			}, 
			// Animation Delay
			animation_delay : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.animation_delay_title, 
				descr : 	cmsmasters_shortcodes.animation_delay_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.animation_delay_descr_note + "</span>", 
				def : 		'0', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				step : 		'50' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.classes_title, 
				descr : 	cmsmasters_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	}, 
	
	
	// Quotes
	cmsmasters_quotes : { 
		title : 	cmsmasters_shortcodes.quotes_title, 
		icon : 		'admin-icon-quotes', 
		pair : 		true, 
		content : 	'quotes', 
		visual : 	false, 
		multiple : 	true, 
		def : 		'[cmsmasters_quote name="Name"]' + "<p>" + cmsmasters_shortcodes.def_text + "</p>" + '[/cmsmasters_quote]', 
		fields : { 
			// Quotes
			quotes : { 
				type : 		'multiple', 
				title : 	cmsmasters_shortcodes.quotes_title, 
				descr : 	"Here you can add, edit, remove or sort quotes", 
				def : 		'[cmsmasters_quote name="Name"]' + "<p>" + cmsmasters_shortcodes.def_text + "</p>" + '[/cmsmasters_quote]', 
				required : 	true, 
				width : 	'half' 
			}, 
			// Mode
			mode : { 
				type : 		'radio', 
				title : 	cmsmasters_shortcodes.mode, 
				descr : 	cmsmasters_shortcodes.quotes_field_mode_descr, 
				def : 		'grid', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'grid' : 	cmsmasters_shortcodes.quotes_field_mode_choice_grid, 
							'slider' : 	cmsmasters_shortcodes.quotes_field_mode_choice_slider 
				} 
			}, 
			// Columns Count
			columns : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.columns_count, 
				descr : 	cmsmasters_shortcodes.quotes_field_col_count_descr, 
				def : 		'2', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'1' : 	'1', 
							'2' : 	'2', 
							'3' : 	'3', 
							'4' : 	'4' 
				}, 
				depend : 	'mode:grid' 
			}, 
			// Pause Time
			speed : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.pause_time, 
				descr : 	cmsmasters_shortcodes.quotes_field_slideshow_speed_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.quotes_field_slideshow_speed_descr_note + "</span>", 
				def : 		'5', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				depend : 	'mode:slider' 
			}, 
			// CSS3 Animation
			animation : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.animation_title, 
				descr : 	cmsmasters_shortcodes.animation_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.animation_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	get_animations() 
			}, 
			// Animation Delay
			animation_delay : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.animation_delay_title, 
				descr : 	cmsmasters_shortcodes.animation_delay_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.animation_delay_descr_note + "</span>", 
				def : 		'0', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				step : 		'50' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.classes_title, 
				descr : 	cmsmasters_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	}, 
	
	
	// Sidebar
	cmsmasters_sidebar : { 
		title : 	cmsmasters_shortcodes.sidebar_title, 
		icon : 		'admin-icon-sidebar', 
		pair : 		false, 
		content : 	false, 
		visual : 	false, 
		multiple : 	false, 
		def : 		"", 
		fields : { 
			// Sidebar
			sidebar : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.sidebar_title, 
				descr : 	cmsmasters_shortcodes.sidebar_field_sidebar_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.sidebar_field_sidebar_descr_note + '<a href=\"' + cmsmasters_shortcodes.admin_url + 'admin.php?page=cmsmasters-settings-element&tab=sidebar\" target=\"_blank\">' + ' ' + cmsmasters_shortcodes.sidebar_field_sidebar_descr_note_link + "</a></span>", 
				def : 		'', 
				required : 	true, 
				width : 	'half', 
				choises : 	cmsmasters_composer_sidebars() 
			}, 
			// Sidebar Layout
			layout : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.sidebar_field_sidebar_layout_title, 
				descr : 	"<span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.sidebar_field_sidebar_layout_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	get_layouts() 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.classes_title, 
				descr : 	cmsmasters_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	}, 
	
	
	// Slider
	cmsmasters_slider : { 
		title : 	cmsmasters_shortcodes.slider_title, 
		icon : 		'admin-icon-slider', 
		pair : 		false, 
		content : 	false, 
		visual : 	false, 
		multiple : 	false, 
		def : 		"", 
		fields : { 
			// Slider Plugin
			slider_plugin : { 
				type : 		'radio', 
				title : 	cmsmasters_shortcodes.slider_field_plugin_title, 
				descr : 	cmsmasters_shortcodes.slider_field_plugin_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.slider_field_plugin_descr_note + "</span>", 
				def : 		'layer', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'layer' : 	cmsmasters_shortcodes.slider_layer, 
							'rev' : 	cmsmasters_shortcodes.slider_rev 
				} 
			}, 
			// Layer Slider Name
			slider_layer : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.slider_field_layer_id_title, 
				descr : 	cmsmasters_shortcodes.slider_field_layer_id_descr, 
				def : 		'', 
				required : 	true, 
				width : 	'half', 
				choises : 	cmsmasters_composer_layer_slider(), 
				depend : 	'slider_plugin:layer' 
			}, 
			// Revolution Slider Name
			slider_rev : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.slider_field_rev_id_title, 
				descr : 	cmsmasters_shortcodes.slider_field_rev_id_descr, 
				def : 		'', 
				required : 	true, 
				width : 	'half', 
				choises : 	cmsmasters_composer_rev_slider(), 
				depend : 	'slider_plugin:rev' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.classes_title, 
				descr : 	cmsmasters_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	}, 
	
	
	// Social Sharing
	cmsmasters_social : { 
		title : 	cmsmasters_shortcodes.social_sharing_title, 
		icon : 		'admin-icon-social', 
		pair : 		false, 
		content : 	false, 
		visual : 	false, 
		multiple : 	false, 
		def : 		"", 
		fields : { 
			// Facebook Like Button
			facebook : { 
				type : 		'checkbox', 
				title : 	cmsmasters_shortcodes.social_sharing_field_fb_button_title, 
				descr : 	'', 
				def : 		'true', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'true' : 	cmsmasters_shortcodes.choice_show 
				} 
			}, 
			// Twitter Tweet Button
			twitter : { 
				type : 		'checkbox', 
				title : 	cmsmasters_shortcodes.social_sharing_field_twitter_button_title, 
				descr : 	'', 
				def : 		'true', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'true' : 	cmsmasters_shortcodes.choice_show 
				} 
			}, 
			// GooglePlus +1 Button
			google : { 
				type : 		'checkbox', 
				title : 	cmsmasters_shortcodes.social_sharing_field_googleplus_button_title, 
				descr : 	'', 
				def : 		'true', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'true' : 	cmsmasters_shortcodes.choice_show 
				} 
			}, 
			// Pinterest Pin it Button
			pinterest : { 
				type : 		'checkbox', 
				title : 	cmsmasters_shortcodes.social_sharing_field_pinterest_button_title, 
				descr : 	'', 
				def : 		'true', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'true' : 	cmsmasters_shortcodes.choice_show 
				} 
			}, 
			// Buttons Type
			type : { 
				type : 		'radio', 
				title : 	cmsmasters_shortcodes.social_sharing_field_buttons_type_title, 
				descr : 	'', 
				def : 		'horizontal', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'horizontal' : 	cmsmasters_shortcodes.choice_horizontal, 
							'vertical' : 	cmsmasters_shortcodes.choice_vertical 
				} 
			}, 
			// CSS3 Animation
			animation : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.animation_title, 
				descr : 	cmsmasters_shortcodes.animation_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.animation_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	get_animations() 
			}, 
			// Animation Delay
			animation_delay : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.animation_delay_title, 
				descr : 	cmsmasters_shortcodes.animation_delay_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.animation_delay_descr_note + "</span>", 
				def : 		'0', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				step : 		'50' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.classes_title, 
				descr : 	cmsmasters_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	}, 
	
	
	// Table
	cmsmasters_table : { 
		title : 	cmsmasters_shortcodes.table_title, 
		icon : 		'admin-icon-table', 
		pair : 		true, 
		content : 	'table', 
		visual : 	false, 
		multiple : 	false, 
		def : 		'[cmsmasters_tr][cmsmasters_td][/cmsmasters_td][cmsmasters_td][/cmsmasters_td][cmsmasters_td][/cmsmasters_td][/cmsmasters_tr][cmsmasters_tr][cmsmasters_td][/cmsmasters_td][cmsmasters_td][/cmsmasters_td][cmsmasters_td][/cmsmasters_td][/cmsmasters_tr][cmsmasters_tr][cmsmasters_td][/cmsmasters_td][cmsmasters_td][/cmsmasters_td][cmsmasters_td][/cmsmasters_td][/cmsmasters_tr]', 
		fields : { 
			// Table Content
			table : { 
				type : 		'table', 
				title : 	cmsmasters_shortcodes.table_field_table_content_title, 
				descr : 	cmsmasters_shortcodes.table_field_table_content_descr, 
				def : 		'[cmsmasters_tr][cmsmasters_td][/cmsmasters_td][cmsmasters_td][/cmsmasters_td][cmsmasters_td][/cmsmasters_td][/cmsmasters_tr][cmsmasters_tr][cmsmasters_td][/cmsmasters_td][cmsmasters_td][/cmsmasters_td][cmsmasters_td][/cmsmasters_td][/cmsmasters_tr][cmsmasters_tr][cmsmasters_td][/cmsmasters_td][cmsmasters_td][/cmsmasters_td][cmsmasters_td][/cmsmasters_td][/cmsmasters_tr]', 
				required : 	true, 
				width : 	'full' 
			}, 
			// Table Caption
			caption : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.table_field_table_caption_title, 
				descr : 	cmsmasters_shortcodes.table_field_table_caption_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// CSS3 Animation
			animation : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.animation_title, 
				descr : 	cmsmasters_shortcodes.animation_descr + " <br /><span>" + cmsmasters_shortcodes.note  + ' ' + cmsmasters_shortcodes.animation_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	get_animations() 
			}, 
			// Animation Delay
			animation_delay : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.animation_delay_title, 
				descr : 	cmsmasters_shortcodes.animation_delay_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.animation_delay_descr_note + "</span>", 
				def : 		'0', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				step : 		'50' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.classes_title, 
				descr : 	cmsmasters_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	}, 
	
	
	// Tabs
	cmsmasters_tabs : { 
		title : 	cmsmasters_shortcodes.tabs_title, 
		icon : 		'admin-icon-tabs', 
		pair : 		true, 
		content : 	'tabs', 
		visual : 	false, 
		multiple : 	true, 
		def : 		'[cmsmasters_tab title="' + cmsmasters_shortcodes.title + '"]<p>' + cmsmasters_shortcodes.def_text + '</p>[/cmsmasters_tab]', 
		fields : { 
			// Tabs
			tabs : { 
				type : 		'multiple', 
				title : 	cmsmasters_shortcodes.tabs_title, 
				descr : 	cmsmasters_shortcodes.tabs_field_tabs_descr, 
				def : 		'[cmsmasters_tab title="' + cmsmasters_shortcodes.title + '"]<p>' + cmsmasters_shortcodes.def_text + '</p>[/cmsmasters_tab]', 
				required : 	true, 
				width : 	'half' 
			}, 
			// Mode
			mode : { 
				type : 		'radio', 
				title : 	cmsmasters_shortcodes.mode, 
				descr : 	cmsmasters_shortcodes.tabs_field_mode_descr, 
				def : 		'tab', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'tab' : 	cmsmasters_shortcodes.tabs_field_mode_choice_tabs, 
							'tour' : 	cmsmasters_shortcodes.tabs_field_mode_choice_tour 
				} 
			}, 
			// Position
			position : { 
				type : 		'radio', 
				title : 	cmsmasters_shortcodes.tabs_field_position_title, 
				descr : 	cmsmasters_shortcodes.tabs_field_position_descr, 
				def : 		'left', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'left' : 	cmsmasters_shortcodes.position_choice_left_side, 
							'right' : 	cmsmasters_shortcodes.position_choice_right_side 
				}, 
				depend : 	'mode:tour' 
			}, 
			// Active Tab
			active : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.tabs_field_active_title, 
				descr : 	cmsmasters_shortcodes.tabs_field_active_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.tabs_field_active_descr_note + "</span>", 
				def : 		'1', 
				required : 	true, 
				width : 	'half' 
			}, 
			// CSS3 Animation
			animation : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.animation_title, 
				descr : 	cmsmasters_shortcodes.animation_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.animation_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	get_animations() 
			}, 
			// Animation Delay
			animation_delay : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.animation_delay_title, 
				descr : 	cmsmasters_shortcodes.animation_delay_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.animation_delay_descr_note + "</span>", 
				def : 		'0', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				step : 		'50' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.classes_title, 
				descr : 	cmsmasters_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	}, 
	
	
	// Toggles
	cmsmasters_toggles : { 
		title : 	cmsmasters_shortcodes.toggles_title, 
		icon : 		'admin-icon-toggles', 
		pair : 		true, 
		content : 	'toggles', 
		visual : 	false, 
		multiple : 	true, 
		def : 		'[cmsmasters_toggle title="' + cmsmasters_shortcodes.title + '"]<p>' + cmsmasters_shortcodes.def_text + '</p>[/cmsmasters_toggle]', 
		fields : { 
			// Toggles
			toggles : { 
				type : 		'multiple', 
				title : 	cmsmasters_shortcodes.toggles_title, 
				descr : 	cmsmasters_shortcodes.toggles_field_toggles_descr, 
				def : 		'[cmsmasters_toggle title="' + cmsmasters_shortcodes.title + '"]<p>' + cmsmasters_shortcodes.def_text + '</p>[/cmsmasters_toggle]', 
				required : 	true, 
				width : 	'half' 
			}, 
			// Mode
			mode : { 
				type : 		'radio', 
				title : 	cmsmasters_shortcodes.mode, 
				descr : 	cmsmasters_shortcodes.toggles_field_mode_descr, 
				def : 		'toggle', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'toggle' : 		cmsmasters_shortcodes.toggles_field_mode_choice_toggles, 
							'accordion' : 	cmsmasters_shortcodes.toggles_field_mode_choice_accordion 
				} 
			}, 
			// Active Toggle
			active : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.toggles_field_active_title, 
				descr : 	cmsmasters_shortcodes.toggles_field_active_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.toggles_field_active_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Sorting
			sort : { 
				type : 		'checkbox', 
				title : 	cmsmasters_shortcodes.toggles_field_sorting_title, 
				descr : 	cmsmasters_shortcodes.toggles_field_sorting_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half',  
				choises : { 
							'true' : 	cmsmasters_shortcodes.choice_enable 
				} 
			},  
			// CSS3 Animation
			animation : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.animation_title, 
				descr : 	cmsmasters_shortcodes.animation_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.animation_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	get_animations() 
			}, 
			// Animation Delay
			animation_delay : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.animation_delay_title, 
				descr : 	cmsmasters_shortcodes.animation_delay_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.animation_delay_descr_note + "</span>", 
				def : 		'0', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				step : 		'50' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.classes_title, 
				descr : 	cmsmasters_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half'
			} 
		} 
	}, 
	
	
	// Twitter Stripe
	cmsmasters_twitter : { 
		title : 	cmsmasters_shortcodes.twitter_title, 
		icon : 		'admin-icon-twitter', 
		pair : 		false, 
		content : 	false, 
		visual : 	false, 
		multiple : 	false, 
		def : 		"", 
		fields : { 
			// Twitter Username
			user : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.twitter_field_username_title, 
				descr : 	cmsmasters_shortcodes.twitter_field_username_descr, 
				def : 		'', 
				required : 	true, 
				width : 	'half' 
			}, 
			// Tweets Number
			count : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.twitter_field_tweets_number_title, 
				descr : 	cmsmasters_shortcodes.twitter_field_tweets_number_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.value_number + ' ' + cmsmasters_shortcodes.twitter_field_tweets_number_descr_note + "</span>", 
				def : 		'5', 
				required : 	true, 
				width : 	'number', 
				min : 		'1' 
			}, 
			// Date visibility
			date : { 
				type : 		'checkbox', 
				title : 	cmsmasters_shortcodes.twitter_field_tweets_date_title, 
				descr : 	cmsmasters_shortcodes.twitter_field_tweets_date_descr, 
				def : 		'true', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'true' : 	cmsmasters_shortcodes.choice_enable 
				} 
			}, 
			// Twitter Controls
			control : { 
				type : 		'checkbox', 
				title : 	cmsmasters_shortcodes.twitter_field_slider_controls_title, 
				descr : 	cmsmasters_shortcodes.twitter_field_slider_controls_descr, 
				def : 		'true', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'true' : 	cmsmasters_shortcodes.choice_enable 
				} 
			}, 
			// Twitter Autoplay
			autoplay : { 
				type : 		'checkbox', 
				title : 	cmsmasters_shortcodes.autoplay, 
				descr : 	cmsmasters_shortcodes.twitter_field_slider_autoplay_descr, 
				def : 		'true', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'true' : 	cmsmasters_shortcodes.choice_enable 
				} 
			}, 
			// Twitter Speed
			speed : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.pause_time, 
				descr : 	cmsmasters_shortcodes.twitter_field_slider_speed_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.twitter_field_slider_speed_descr_note + "</span>", 
				def : 		'3', 
				required : 	false, 
				width : 	'small'
			}, 
			// CSS3 Animation
			animation : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.animation_title, 
				descr : 	cmsmasters_shortcodes.animation_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.animation_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	get_animations() 
			}, 
			// Animation Delay
			animation_delay : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.animation_delay_title, 
				descr : 	cmsmasters_shortcodes.animation_delay_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.animation_delay_descr_note + "</span>", 
				def : 		'0', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				step : 		'50' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.classes_title, 
				descr : 	cmsmasters_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	}, 
	
	
	// Video
	cmsmasters_videos : { 
		title : 	cmsmasters_shortcodes.video_title, 
		icon : 		'admin-icon-video', 
		pair : 		true, 
		content : 	'video', 
		visual : 	false, 
		multiple : 	true, 
		def : 		'[cmsmasters_video]' + cmsmasters_shortcodes.media_def + '[/cmsmasters_video]', 
		fields : { 
			// Video
			video : { 
				type : 		'multiple', 
				title : 	cmsmasters_shortcodes.video_title, 
				descr : 	cmsmasters_shortcodes.video_field_video_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.video_field_video_descr_note + ' (' + cmsmasters_shortcodes.more_info + " <a href='http://www.w3schools.com/html/html5_video.asp' target='_blank'>" + cmsmasters_shortcodes.click_here + "</a>)</span>", 
				def : 		'[cmsmasters_video]' + cmsmasters_shortcodes.media_def + '[/cmsmasters_video]', 
				required : 	true, 
				width : 	'full' 
			}, 
			// Poster
			poster : { 
				type : 			'upload', 
				title : 		cmsmasters_shortcodes.video_field_poster_title, 
				descr : 		cmsmasters_shortcodes.video_field_poster_descr, 
				def : 			'', 
				required : 		false, 
				width : 		'half', 
				frame : 		'post', 
				library : 		'image', 
				multiple : 		false, 
				description : 	false, 
				caption : 		false, 
				align : 		false, 
				link : 			false, 
				size : 			true 
			}, 
			// Max Width
			width : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.video_field_maxwidth_title, 
				descr : 	cmsmasters_shortcodes.video_field_maxwidth_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.size_note_short + ' ' + cmsmasters_shortcodes.embed_field_maxwidth_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'number', 
				min : 		'0' 
			}, 
			// Max Height
			height : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.video_field_maxheight_title, 
				descr : 	cmsmasters_shortcodes.video_field_maxheight_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.size_note_short + ' ' + cmsmasters_shortcodes.embed_field_maxheight_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'number', 
				min : 		'0' 
			}, 
			// Wrap Video
			wrap : { 
				type : 		'checkbox', 
				title : 	cmsmasters_shortcodes.embed_field_wrap_title, 
				descr : 	cmsmasters_shortcodes.embed_field_wrap_descr, 
				def : 		'true', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'true' : 	cmsmasters_shortcodes.choice_enable 
				} 
			}, 
			// Autoplay
			autoplay : { 
				type : 		'checkbox', 
				title : 	cmsmasters_shortcodes.autoplay, 
				descr : 	cmsmasters_shortcodes.video_field_autoplay_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'true' : 	cmsmasters_shortcodes.choice_enable 
				} 
			}, 
			// Muted
			muted : { 
				type : 		'checkbox', 
				title : 	cmsmasters_shortcodes.video_field_muted_title, 
				descr : 	cmsmasters_shortcodes.video_field_muted_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'true' : 	cmsmasters_shortcodes.choice_enable 
				} 
			}, 
			// Repeat
			loop : { 
				type : 		'checkbox', 
				title : 	cmsmasters_shortcodes.repeat, 
				descr : 	cmsmasters_shortcodes.video_field_repeat_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'true' : 	cmsmasters_shortcodes.choice_enable 
				} 
			}, 
			// Preload
			preload : { 
				type : 		'radio', 
				title : 	cmsmasters_shortcodes.preload, 
				descr : 	cmsmasters_shortcodes.video_field_preload_descr, 
				def : 		'none', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'none' : 		cmsmasters_shortcodes.video_field_preload_choice_none, 
							'auto' : 		cmsmasters_shortcodes.video_field_preload_choice_auto, 
							'metadata' : 	cmsmasters_shortcodes.video_field_preload_choice_metadata 
				} 
			}, 
			// CSS3 Animation
			animation : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.animation_title, 
				descr : 	cmsmasters_shortcodes.animation_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.animation_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	get_animations() 
			}, 
			// Animation Delay
			animation_delay : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.animation_delay_title, 
				descr : 	cmsmasters_shortcodes.animation_delay_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.animation_delay_descr_note + "</span>", 
				def : 		'0', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				step : 		'50' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.classes_title, 
				descr : 	cmsmasters_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	}, 
	
	
	// Custom HTML
	cmsmasters_html : { 
		title : 	cmsmasters_shortcodes.custom_html_title, 
		icon : 		'admin-icon-html', 
		pair : 		true, 
		content : 	'html', 
		visual : 	false, 
		multiple : 	false, 
		def : 		"", 
		fields : { 
			// HTML Code
			html : { 
				type : 		'base64', 
				title : 	cmsmasters_shortcodes.custom_html_field_code_title, 
				descr : 	cmsmasters_shortcodes.custom_html_field_code_descr, 
				def : 		'', 
				required : 	true, 
				width : 	'full' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.classes_title, 
				descr : 	cmsmasters_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	}, 
	
	
	// Custom CSS
	cmsmasters_css : { 
		title : 	cmsmasters_shortcodes.custom_css_title, 
		icon : 		'admin-icon-css', 
		pair : 		true, 
		content : 	'css', 
		visual : 	false, 
		multiple : 	false, 
		def : 		"", 
		fields : { 
			// CSS Code
			css : { 
				type : 		'base64', 
				title : 	cmsmasters_shortcodes.custom_css_field_code_title, 
				descr : 	cmsmasters_shortcodes.custom_css_field_code_descr, 
				def : 		'', 
				required : 	true, 
				width : 	'full' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.classes_title, 
				descr : 	cmsmasters_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	}, 
	
	
	// Custom JS
	cmsmasters_js : { 
		title : 	cmsmasters_shortcodes.custom_js_title, 
		icon : 		'admin-icon-js', 
		pair : 		true, 
		content : 	'js', 
		visual : 	false, 
		multiple : 	false, 
		def : 		"", 
		fields : { 
			// JavaScript Code
			js : { 
				type : 		'base64', 
				title : 	cmsmasters_shortcodes.custom_js_field_code_title, 
				descr : 	cmsmasters_shortcodes.custom_js_field_code_descr, 
				def : 		'', 
				required : 	true, 
				width : 	'full' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.classes_title, 
				descr : 	cmsmasters_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	} 
};


// Theme Projects not Supported
if (cmsmasters_composer_pj_compatible() === 'false') {
	var cmsmastersShortcodes_not_pj = {};
	
	
	for (var id in cmsmastersShortcodes) {
		if (id === 'cmsmasters_portfolio') {
			delete cmsmastersShortcodes[id];
		} else if (id === 'cmsmasters_posts_slider') {
			cmsmastersShortcodes[id].fields['post_type']['depend'] = 'order:hide';
			
			
			cmsmastersShortcodes_not_pj[id] = cmsmastersShortcodes[id];
		} else {
			cmsmastersShortcodes_not_pj[id] = cmsmastersShortcodes[id];
		}
	}
	
	
	cmsmastersShortcodes = cmsmastersShortcodes_not_pj;
}


// Theme Profiles not Supported
if (cmsmasters_composer_pl_compatible() === 'false') {
	var cmsmastersShortcodes_not_pl = {};
	
	
	for (var id in cmsmastersShortcodes) {
		if (id === 'cmsmasters_profiles') {
			delete cmsmastersShortcodes[id];
		} else {
			cmsmastersShortcodes_not_pl[id] = cmsmastersShortcodes[id];
		}
	}
	
	
	cmsmastersShortcodes = cmsmastersShortcodes_not_pl;
}


// CMSMasters Custom Shortcodes WooCommerce Extension
if (cmsmasters_composer_products() === 'true') {
	cmsmastersShortcodes.cmsmasters_products = {
		title : 	cmsmasters_shortcodes.products_title, 
		icon : 		'admin-icon-shop', 
		pair : 		false, 
		content : 	false, 
		visual : 	false, 
		multiple : 	false, 
		def : 		'', 
		fields : { 
			// Products Shortcode Choise
			products_shortcode : { 
				type : 		'radio', 
				title : 	cmsmasters_shortcodes.products_shortcode_title, 
				descr : 	cmsmasters_shortcodes.products_shortcode_descr, 
				def : 		'recent_products', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'recent_products' : 		cmsmasters_shortcodes.choice_recent_products, 
							'featured_products' : 		cmsmasters_shortcodes.choice_featured_products, 
							'sale_products' : 			cmsmasters_shortcodes.choice_sale_products, 
							'best_selling_products' : 	cmsmasters_shortcodes.choice_best_selling_products, 
							'top_rated_products' : 		cmsmasters_shortcodes.choice_top_rated_products 
				} 
			}, 
			// Order By
			orderby : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.orderby_title, 
				descr : 	cmsmasters_shortcodes.products_field_orderby_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.products_field_orderby_descr_note + ' ' + cmsmasters_shortcodes.choice_best_selling_products + ' and ' + cmsmasters_shortcodes.choice_top_rated_products + "</span>", 
				def : 		'date', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'date' : 		cmsmasters_shortcodes.choice_date, 
							'name' : 		cmsmasters_shortcodes.name, 
							'id' : 			cmsmasters_shortcodes.choice_id 
				} 
			}, 
			// Order
			order : { 
				type : 		'radio', 
				title : 	cmsmasters_shortcodes.order_title, 
				descr : 	cmsmasters_shortcodes.order_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.products_field_orderby_descr_note + ' ' + cmsmasters_shortcodes.choice_best_selling_products + ' and ' + cmsmasters_shortcodes.choice_top_rated_products + "</span>",  
				def : 		'DESC', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'ASC' : 	cmsmasters_shortcodes.choice_asc, 
							'DESC' : 	cmsmasters_shortcodes.choice_desc
				} 
			}, 
			// Products Number
			count : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.products_field_prod_number_title, 
				descr : 	cmsmasters_shortcodes.products_field_prod_number_descr, 
				def : 		'10', 
				required : 	true, 
				width : 	'number', 
				min : 		'1' 
			}, 
			// Columns Count
			columns : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.columns_count, 
				descr : 	cmsmasters_shortcodes.products_field_col_count_descr, 
				def : 		'4', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'1' : 	'1', 
							'2' : 	'2', 
							'3' : 	'3', 
							'4' : 	'4' 
				} 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.classes_title, 
				descr : 	cmsmasters_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	};
	
	
	cmsmastersShortcodes.cmsmasters_selected_products = {
		title : 	cmsmasters_shortcodes.selected_products_title, 
		icon : 		'admin-icon-product', 
		pair : 		false, 
		content : 	false, 
		visual : 	false, 
		multiple : 	false, 
		def : 		'', 
		fields : { 
			// Order By
			orderby : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.orderby_title, 
				descr : 	cmsmasters_shortcodes.products_field_orderby_descr, 
				def : 		'date', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'date' : 		cmsmasters_shortcodes.choice_date, 
							'name' : 		cmsmasters_shortcodes.name, 
							'id' : 			cmsmasters_shortcodes.choice_id 
				} 
			}, 
			// Order
			order : { 
				type : 		'radio', 
				title : 	cmsmasters_shortcodes.order_title, 
				descr : 	cmsmasters_shortcodes.order_descr, 
				def : 		'DESC', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'ASC' : 	cmsmasters_shortcodes.choice_asc, 
							'DESC' : 	cmsmasters_shortcodes.choice_desc
				} 
			}, 
			// IDs
			ids : { 
				type : 		'select_multiple', 
				title : 	cmsmasters_shortcodes.selected_products_field_ids, 
				descr : 	cmsmasters_shortcodes.selected_products_field_ids_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.selected_products_field_ids_descr_note + "</span>", 
				def : 		'', 
				required : 	true, 
				width : 	'half', 
				choises : 	cmsmasters_composer_product_ids() 
			}, 
			// Columns Count
			columns : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.columns_count, 
				descr : 	cmsmasters_shortcodes.products_field_col_count_descr, 
				def : 		'4', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'1' : 	'1', 
							'2' : 	'2', 
							'3' : 	'3', 
							'4' : 	'4' 
				} 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.classes_title, 
				descr : 	cmsmasters_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	};
}


// CMSMasters Custom Shortcodes PayPal Donations Extension
if (cmsmasters_composer_paypal_donations() === 'true') {
	cmsmastersShortcodes.cmsmasters_paypal_donations = {
		title : 	cmsmasters_shortcodes.paypal_donations_title, 
		icon : 		'admin-icon-donate', 
		pair : 		false, 
		content : 	false, 
		visual : 	false, 
		multiple : 	false, 
		def : 		"", 
		fields : { 
			// Amount
			amount : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.paypal_donations_field_amount_title, 
				descr : 	cmsmasters_shortcodes.paypal_donations_field_amount_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.paypal_donations_field_amount_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'number', 
				min : 		'0' 
			}, 
			// Purpose
			purpose : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.paypal_donations_field_purpose_title, 
				descr : 	cmsmasters_shortcodes.paypal_donations_field_purpose_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.paypal_donations_field_purpose_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Reference
			reference : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.paypal_donations_field_reference_title, 
				descr : 	cmsmasters_shortcodes.paypal_donations_field_reference_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.paypal_donations_field_reference_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Button Title
			button_title : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.button_field_label_title, 
				descr : 	cmsmasters_shortcodes.button_field_label_descr, 
				def : 		cmsmasters_shortcodes.button, 
				required : 	false, 
				width : 	'half' 
			}, 
			// Button Position
			button_text_align : { 
				type : 		'radio', 
				title : 	cmsmasters_shortcodes.button_field_text_align_title, 
				descr : 	cmsmasters_shortcodes.button_field_text_align_descr, 
				def : 		'center', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'left' : 		cmsmasters_shortcodes.choice_left, 
							'center' : 		cmsmasters_shortcodes.choice_center, 
							'right' : 		cmsmasters_shortcodes.choice_right, 
				} 
			}, 
			// Button Style
			button_style : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.button_field_style_title, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'' : 									cmsmasters_shortcodes.choice_default, 
							'cmsmasters_but_bg_hover' : 					'cmsmasters_but_bg_hover', 
							'cmsmasters_but_bg_slide_left' : 			'cmsmasters_but_bg_slide_left', 
							'cmsmasters_but_bg_slide_right' : 			'cmsmasters_but_bg_slide_right', 
							'cmsmasters_but_bg_slide_top' : 				'cmsmasters_but_bg_slide_top', 
							'cmsmasters_but_bg_slide_bottom' : 			'cmsmasters_but_bg_slide_bottom', 
							'cmsmasters_but_bg_expand_vert' : 			'cmsmasters_but_bg_expand_vert', 
							'cmsmasters_but_bg_expand_hor' : 			'cmsmasters_but_bg_expand_hor', 
							'cmsmasters_but_bg_expand_diag' : 			'cmsmasters_but_bg_expand_diag', 
							'cmsmasters_but_shadow' : 					'cmsmasters_but_shadow', 
							'cmsmasters_but_icon_dark_bg' : 				'cmsmasters_but_icon_dark_bg', 
							'cmsmasters_but_icon_light_bg' : 			'cmsmasters_but_icon_light_bg', 
							'cmsmasters_but_icon_divider' : 				'cmsmasters_but_icon_divider', 
							'cmsmasters_but_icon_inverse' : 				'cmsmasters_but_icon_inverse', 
							'cmsmasters_but_icon_slide_left' : 			'cmsmasters_but_icon_slide_left', 
							'cmsmasters_but_icon_slide_right' : 			'cmsmasters_but_icon_slide_right', 
							'cmsmasters_but_icon_hover_slide_left' : 	'cmsmasters_but_icon_hover_slide_left', 
							'cmsmasters_but_icon_hover_slide_right' : 	'cmsmasters_but_icon_hover_slide_right', 
							'cmsmasters_but_icon_hover_slide_top' : 		'cmsmasters_but_icon_hover_slide_top', 
							'cmsmasters_but_icon_hover_slide_bottom' : 	'cmsmasters_but_icon_hover_slide_bottom' 
				} 
			}, 
			// Button Google Font
			button_font_family : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.button_field_label_google_font_title, 
				descr : 	cmsmasters_shortcodes.button_field_label_google_font_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.button_field_label_google_font_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	cmsmasters_composer_fonts() 
			}, 
			// Button Font Size
			button_font_size : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.button_field_label_font_size_title, 
				descr : 	cmsmasters_shortcodes.button_field_label_font_size_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.button_field_label_font_size_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'number', 
				min : 		'0' 
			}, 
			// Button Line Height
			button_line_height : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.button_field_label_line_hight_title, 
				descr : 	cmsmasters_shortcodes.button_field_label_line_height_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.button_field_label_line_height_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'number', 
				min : 		'0' 
			}, 
			// Button Font Weight
			button_font_weight : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.button_field_label_font_weight_title, 
				descr : 	cmsmasters_shortcodes.button_field_label_font_weight_descr, 
				def : 		'normal', 
				required : 	false, 
				width : 	'half', 
				choises : 	cmsmasters_composer_font_weight() 
			}, 
			// Button Font Style
			button_font_style : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.button_field_label_font_style_title, 
				descr : 	cmsmasters_shortcodes.button_field_label_font_style_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	cmsmasters_composer_font_style() 
			}, 
			// Button Left & Right Paddings
			button_padding_hor : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.button_field_paddings_title, 
				descr : 	cmsmasters_shortcodes.button_field_paddings_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.button_field_paddings_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'number', 
				min : 		'0' 
			}, 
			// Button Border Width
			button_border_width : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.button_field_border_width_title, 
				descr : 	cmsmasters_shortcodes.button_field_border_width_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.size_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				max : 		'20' 
			}, 
			// Button Border Style
			button_border_style : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.button_field_border_style_title, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'solid' : 	cmsmasters_shortcodes.choice_solid, 
							'dotted' : 	cmsmasters_shortcodes.choice_dotted, 
							'dashed' : 	cmsmasters_shortcodes.choice_dashed, 
							'double' : 	cmsmasters_shortcodes.choice_double, 
							'groove' : 	cmsmasters_shortcodes.choice_groove, 
							'ridge' : 	cmsmasters_shortcodes.choice_ridge, 
							'inset' : 	cmsmasters_shortcodes.choice_inset, 
							'outset' : 	cmsmasters_shortcodes.choice_outset 
				} 
			}, 
			// Button Border Radius
			button_border_radius : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.button_field_border_radius_title, 
				descr : 	cmsmasters_shortcodes.button_field_border_radius_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.border_radius_descr_note_1 + " <br />" + cmsmasters_shortcodes.border_radius_descr_note_2 + " <a href=\"http://www.css3generator.in/border-radius.html\" target=\"_blank\">" + cmsmasters_shortcodes.border_radius_descr_note_3 + "</a>. <br />" + cmsmasters_shortcodes.border_radius_descr_note_4 + " <a href=\"http://screencast.com/t/krCXdo0NN\" target=\"_blank\">" + cmsmasters_shortcodes.border_radius_descr_note_5 + "</a>.</span>", 
				def : 		'', 
				required : 	false 
			}, 
			// Button Background Color
			button_bg_color : { 
				type : 		'rgba', 
				title : 	cmsmasters_shortcodes.button_field_bg_color_title, 
				descr : 	cmsmasters_shortcodes.button_field_bg_color_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.clear_color_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Button Text Color
			button_text_color : { 
				type : 		'rgba', 
				title : 	cmsmasters_shortcodes.button_field_txt_color_title, 
				descr : 	cmsmasters_shortcodes.button_field_txt_color_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.clear_color_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Button Border Color
			button_border_color : { 
				type : 		'rgba', 
				title : 	cmsmasters_shortcodes.button_field_bd_color_title, 
				descr : 	cmsmasters_shortcodes.button_field_bd_color_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.clear_color_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Button Background Color on Mouseover
			button_bg_color_h : { 
				type : 		'rgba', 
				title : 	cmsmasters_shortcodes.button_field_bg_color_h_title, 
				descr : 	cmsmasters_shortcodes.button_field_bg_color_h_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.clear_color_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Button Text Color on Mouseover
			button_text_color_h : { 
				type : 		'rgba', 
				title : 	cmsmasters_shortcodes.button_field_txt_color_h_title, 
				descr : 	cmsmasters_shortcodes.button_field_txt_color_h_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.clear_color_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Button Border Color on Mouseover
			button_border_color_h : { 
				type : 		'rgba', 
				title : 	cmsmasters_shortcodes.button_field_bd_color_h_title, 
				descr : 	cmsmasters_shortcodes.button_field_bd_color_h_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.clear_color_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Button Icon
			button_icon : { 
				type : 		'icon', 
				title : 	cmsmasters_shortcodes.button_field_icon_title, 
				descr : 	cmsmasters_shortcodes.button_field_icon_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'full', 
				choises : 	cmsmasters_composer_icons() 
			}, 
			// CSS3 Animation
			animation : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.animation_title, 
				descr : 	cmsmasters_shortcodes.animation_descr + " <br /><span>" + cmsmasters_shortcodes.note  + ' ' + cmsmasters_shortcodes.animation_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	get_animations() 
			}, 
			// Animation Delay
			animation_delay : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.animation_delay_title, 
				descr : 	cmsmasters_shortcodes.animation_delay_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.animation_delay_descr_note + "</span>", 
				def : 		'0', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				step : 		'50' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.classes_title, 
				descr : 	cmsmasters_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	};
}


// CMSMasters Custom Shortcodes Donations Extension
if (cmsmasters_composer_donations() === 'true') {
	var button_new_fields = {};
	
	
	for (var id in cmsmastersShortcodes.cmsmasters_button.fields) {
		if (id === 'button_title') {
			button_new_fields[id] = cmsmastersShortcodes.cmsmasters_button.fields[id];
			
			
			button_new_fields['button_type'] = { 
				type : 		'radio', 
				title : 	cmsmasters_shortcodes.button_field_type_title, 
				descr : 	'', 
				def : 		'regular', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'regular' : 	cmsmasters_shortcodes.choice_button_type_regular, 
							'donation' : 	cmsmasters_shortcodes.choice_button_type_donation 
				} 
			};
		} else if (id === 'button_link') {
			cmsmastersShortcodes.cmsmasters_button.fields[id]['depend'] = 'button_type:regular';
			
			
			button_new_fields[id] = cmsmastersShortcodes.cmsmasters_button.fields[id];
		} else {
			button_new_fields[id] = cmsmastersShortcodes.cmsmasters_button.fields[id];
		}
		
		
		if (id === 'button_link') {
			button_new_fields['button_campaign'] = { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.button_field_campaign_title, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	cmsmasters_composer_donation_but_campaign_ids(), 
				depend : 	'button_type:donation' 
			};
			
			
			button_new_fields[id] = cmsmastersShortcodes.cmsmasters_button.fields[id];
		} else {
			button_new_fields[id] = cmsmastersShortcodes.cmsmasters_button.fields[id];
		}
	}
	
	
	cmsmastersShortcodes.cmsmasters_button.fields = button_new_fields;
	
	
	
	cmsmastersShortcodes.cmsmasters_donations = {
		title : 	cmsmasters_shortcodes.donations_title, 
		icon : 		'admin-icon-donate', 
		pair : 		false, 
		content : 	false, 
		visual : 	false, 
		multiple : 	false, 
		def : 		"", 
		fields : { 
			// Order By
			orderby : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.orderby_title, 
				descr : 	'', 
				def : 		'date', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'date' : 					cmsmasters_shortcodes.choice_date, 
							'cmsmasters_donation_amount' : 	cmsmasters_shortcodes.choice_amount, 
							'rand' : 					cmsmasters_shortcodes.choice_rand 
				} 
			}, 
			// Order
			order : { 
				type : 		'radio', 
				title : 	cmsmasters_shortcodes.order_title, 
				descr : 	cmsmasters_shortcodes.order_descr, 
				def : 		'DESC', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'ASC' : 	cmsmasters_shortcodes.choice_asc, 
							'DESC' : 	cmsmasters_shortcodes.choice_desc
				} 
			}, 
			// Donations Number
			count : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.donations_field_donations_number_title, 
				descr : 	"<span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.donations_field_donations_number_descr_note + "</span>", 
				def : 		'4', 
				required : 	false, 
				width : 	'number', 
				min : 		'0' 
			}, 
			// Donations Campaigns
			campaigns : { 
				type : 		'select_multiple', 
				title : 	cmsmasters_shortcodes.donations_field_campaigns_title, 
				descr : 	cmsmasters_shortcodes.donations_field_campaigns_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.donations_field_campaigns_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	cmsmasters_composer_campaign_ids() 
			}, 
			// Columns Count
			columns : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.columns_count, 
				descr : 	'', 
				def : 		'4', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'1' : 	'1', 
							'2' : 	'2', 
							'3' : 	'3', 
							'4' : 	'4' 
				}
			}, 
			// Donations Metadata
			donation_metadata : { 
				type : 		'checkbox', 
				title : 	cmsmasters_shortcodes.donations_field_postsmeta_title, 
				descr : 	'', 
				def : 		'image,link,campaign,amount', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'image' : 		cmsmasters_shortcodes.choice_image, 
							'link' : 		cmsmasters_shortcodes.choice_link, 
							'campaign' : 	cmsmasters_shortcodes.choice_campaign, 
							'amount' : 		cmsmasters_shortcodes.choice_amount 
				}
			}, 
			// CSS3 Animation
			animation : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.animation_title, 
				descr : 	cmsmasters_shortcodes.animation_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.animation_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	get_animations() 
			}, 
			// Animation Delay
			animation_delay : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.animation_delay_title, 
				descr : 	cmsmasters_shortcodes.animation_delay_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.animation_delay_descr_note + "</span>", 
				def : 		'0', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				step : 		'50' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.classes_title, 
				descr : 	cmsmasters_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	};
	
	
	
	cmsmastersShortcodes.cmsmasters_featured_campaign = {
		title : 	cmsmasters_shortcodes.featured_campaign_title, 
		icon : 		'admin-icon-donate', 
		pair : 		false, 
		content : 	false, 
		visual : 	false, 
		multiple : 	false, 
		def : 		"", 
		fields : { 
			// Campaign ID
			campaign : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.featured_campaign_field_campaign_title, 
				descr : 	'', 
				def : 		'', 
				required : 	true, 
				width : 	'half', 
				choises : 	cmsmasters_composer_campaign_ids() 
			}, 
			// Donations Metadata
			campaign_metadata : { 
				type : 		'checkbox', 
				title : 	cmsmasters_shortcodes.featured_campaign_field_postsmeta_title, 
				descr : 	'', 
				def : 		'image,link,rest_amount,donated_percent,excerpt,donation_but', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'image' : 				cmsmasters_shortcodes.choice_image, 
							'link' : 				cmsmasters_shortcodes.choice_link, 
							'rest_amount' : 		cmsmasters_shortcodes.choice_rest_amount, 
							'donated_percent' : 	cmsmasters_shortcodes.choice_donated_percent, 
							'excerpt' : 			cmsmasters_shortcodes.choice_excerpt, 
							'donation_but' : 		cmsmasters_shortcodes.choice_donation_but 
				}
			}, 
			// CSS3 Animation
			animation : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.animation_title, 
				descr : 	cmsmasters_shortcodes.animation_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.animation_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	get_animations() 
			}, 
			// Animation Delay
			animation_delay : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.animation_delay_title, 
				descr : 	cmsmasters_shortcodes.animation_delay_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.animation_delay_descr_note + "</span>", 
				def : 		'0', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				step : 		'50' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.classes_title, 
				descr : 	cmsmasters_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	};
	
	
	
	cmsmastersShortcodes.cmsmasters_campaigns = {
		title : 	cmsmasters_shortcodes.campaigns_title, 
		icon : 		'admin-icon-donate', 
		pair : 		false, 
		content : 	false, 
		visual : 	false, 
		multiple : 	false, 
		def : 		'', 
		fields : { 
			// Order By
			orderby : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.orderby_title, 
				descr : 	'', 
				def : 		'date', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'date' : 		cmsmasters_shortcodes.choice_date, 
							'campaigns' : 	cmsmasters_shortcodes.choice_campaign, 
							'rand' : 		cmsmasters_shortcodes.choice_rand 
				} 
			}, 
			// Campaigns IDs
			campaigns_ids : { 
				type : 		'select_multiple', 
				title : 	cmsmasters_shortcodes.campaigns_field_campaigns_ids_title, 
				descr : 	cmsmasters_shortcodes.campaigns_field_campaigns_ids_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.campaigns_field_campaigns_ids_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	cmsmasters_composer_campaign_ids(), 
				depend : 	'orderby:campaigns' 
			}, 
			// Order
			order : { 
				type : 		'radio', 
				title : 	cmsmasters_shortcodes.order_title, 
				descr : 	cmsmasters_shortcodes.order_descr, 
				def : 		'DESC', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'ASC' : 	cmsmasters_shortcodes.choice_asc, 
							'DESC' : 	cmsmasters_shortcodes.choice_desc 
				} 
			}, 
			// Campaigns Categories
			campaigns_categories : { 
				type : 		'select_multiple', 
				title : 	cmsmasters_shortcodes.campaigns_field_campaigns_categories_title, 
				descr : 	cmsmasters_shortcodes.campaigns_field_campaigns_categories_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.campaigns_field_campaigns_categories_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	cmsmasters_composer_campaign_categories() 
			}, 
			// Columns Count
			columns : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.columns_count, 
				descr : 	'', 
				def : 		'4', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'1' : 	'1', 
							'2' : 	'2', 
							'3' : 	'3', 
							'4' : 	'4' 
				} 
			}, 
			// Campaigns Number
			count : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.campaigns_field_campaigns_number_title, 
				descr : 	"<span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.campaigns_field_campaigns_number_descr_note + "</span>", 
				def : 		'4', 
				required : 	false, 
				width : 	'number', 
				min : 		'0' 
			}, 
			// Pause Time
			pause : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.pause_time, 
				descr : 	cmsmasters_shortcodes.campaigns_field_pausetime_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.autoslide_def + "</span>", 
				def : 		'5', 
				required : 	false, 
				width : 	'number', 
				min : 		'0' 
			}, 
			// Campaigns Metadata
			campaigns_metadata : { 
				type : 		'checkbox', 
				title : 	cmsmasters_shortcodes.campaigns_field_campaigns_metadata_title, 
				descr : 	'', 
				def : 		'title,excerpt,donated_percent', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'title' : 				cmsmasters_shortcodes.choice_title, 
							'excerpt' : 			cmsmasters_shortcodes.choice_excerpt, 
							'donated_percent' : 	cmsmasters_shortcodes.choice_donated_percent, 
				} 
			}, 
			// CSS3 Animation
			animation : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.animation_title, 
				descr : 	cmsmasters_shortcodes.animation_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.animation_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	get_animations() 
			}, 
			// Animation Delay
			animation_delay : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.animation_delay_title, 
				descr : 	cmsmasters_shortcodes.animation_delay_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.animation_delay_descr_note + "</span>", 
				def : 		'0', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				step : 		'50' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.classes_title, 
				descr : 	cmsmasters_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	};
}


// CMSMasters Custom Shortcodes Timetable Extension
if (cmsmasters_composer_timetable() === 'true') {
	cmsmastersShortcodes.cmsmasters_timetable = { 
		title : 	cmsmasters_shortcodes.timetable_title, 
		icon : 		'admin-icon-table', 
		pair : 		false, 
		content : 	false, 
		visual : 	false, 
		multiple : 	false, 
		def : 		"", 
		fields : { 
			// Events
			event : { 
				type : 		'select_multiple', 
				title : 	cmsmasters_shortcodes.timetable_field_event_title, 
				descr : 	cmsmasters_shortcodes.timetable_field_event_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.timetable_field_event_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	cmsmasters_composer_timetable_events() 
			}, 
			// Event categories
			event_category : { 
				type : 		'select_multiple', 
				title : 	cmsmasters_shortcodes.timetable_field_event_category_title, 
				descr : 	cmsmasters_shortcodes.timetable_field_event_category_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.timetable_field_event_category_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	cmsmasters_composer_timetable_event_categories() 
			}, 
			// Hour categories
			hour_category : { 
				type : 		'select_multiple', 
				title : 	cmsmasters_shortcodes.timetable_field_hour_category_title, 
				descr : 	cmsmasters_shortcodes.timetable_field_hour_category_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.timetable_field_hour_category_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	cmsmasters_composer_timetable_hour_categories() 
			}, 
			// Columns
			columns : { 
				type : 		'select_multiple', 
				title : 	cmsmasters_shortcodes.timetable_field_columns_title, 
				descr : 	cmsmasters_shortcodes.timetable_field_columns_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.timetable_field_columns_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	cmsmasters_composer_timetable_columns() 
			}, 
			// Hour measure
			measure : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.timetable_field_measure_title, 
				descr : 	cmsmasters_shortcodes.timetable_field_measure_descr, 
				def : 		'1', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'1' : 		cmsmasters_shortcodes.timetable_field_measure_choice_hour, 
							'0.5' : 	cmsmasters_shortcodes.timetable_field_measure_choice_half_hour, 
							'0.25' : 	cmsmasters_shortcodes.timetable_field_measure_choice_quarter_hour 
				} 
			}, 
			// Filter style
			filter_style : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.timetable_field_filter_style_title, 
				descr : 	cmsmasters_shortcodes.timetable_field_filter_style_descr, 
				def : 		'dropdown_list', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'dropdown_list' : 	cmsmasters_shortcodes.timetable_field_filter_style_choice_dropdown_list, 
							'tabs' : 			cmsmasters_shortcodes.timetable_field_filter_style_choice_tabs 
				} 
			}, 
			// Filter kind
			filter_kind : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.timetable_field_filter_kind_title, 
				descr : 	cmsmasters_shortcodes.timetable_field_filter_kind_descr, 
				def : 		'event', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'event' : 			cmsmasters_shortcodes.timetable_field_filter_kind_choice_event, 
							'event_category' : 	cmsmasters_shortcodes.timetable_field_filter_kind_choice_event_category 
				} 
			}, 
			// Filter label
			filter_label : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.timetable_field_filter_label_title, 
				descr : 	cmsmasters_shortcodes.timetable_field_filter_label_descr, 
				def : 		cmsmasters_shortcodes.timetable_field_filter_label_def, 
				required : 	false, 
				width : 	'half' 
			}, 
			// Time format
			time_format : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.timetable_field_time_format_title, 
				descr : 	'', 
				def : 		'H.i', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'H.i' : 	'09.03', 
							'H:i' : 	'09:03', 
							'g:i a' : 	'9:03 am', 
							'g:i A' : 	'9:03 AM', 
							'custom' : 	cmsmasters_shortcodes.timetable_field_time_format_choice_custom 
				} 
			}, 
			// Time format custom
			time_format_custom : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.timetable_field_time_format_custom_title, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				depend : 	'time_format:custom' 
			}, 
			// Hide 'All Events' view
			hide_all_events_view : { 
				type : 		'checkbox', 
				title : 	cmsmasters_shortcodes.timetable_field_hide_all_events_view_title, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'1' : 	cmsmasters_shortcodes.choice_enable 
				} 
			}, 
			// Hide first (hours) column
			hide_hours_column : { 
				type : 		'checkbox', 
				title : 	cmsmasters_shortcodes.timetable_field_hide_hours_column_title, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'1' : 	cmsmasters_shortcodes.choice_enable 
				} 
			}, 
			// Show end hour in first (hours) column
			show_end_hour : { 
				type : 		'checkbox', 
				title : 	cmsmasters_shortcodes.timetable_field_show_end_hour_title, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'1' : 	cmsmasters_shortcodes.choice_enable 
				} 
			}, 
			// Event block layout
			event_layout : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.timetable_field_event_layout_title, 
				descr : 	cmsmasters_shortcodes.timetable_field_event_layout_descr, 
				def : 		'1', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'1' : 	cmsmasters_shortcodes.timetable_field_event_layout_choice_type + ' 1', 
							'2' : 	cmsmasters_shortcodes.timetable_field_event_layout_choice_type + ' 2', 
							'3' : 	cmsmasters_shortcodes.timetable_field_event_layout_choice_type + ' 3', 
							'4' : 	cmsmasters_shortcodes.timetable_field_event_layout_choice_type + ' 4', 
							'5' : 	cmsmasters_shortcodes.timetable_field_event_layout_choice_type + ' 5' 
				} 
			}, 
			// Hide empty rows
			hide_empty : { 
				type : 		'checkbox', 
				title : 	cmsmasters_shortcodes.timetable_field_hide_empty_title, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'1' : 	cmsmasters_shortcodes.choice_enable 
				} 
			}, 
			// Disable event url
			disable_event_url : { 
				type : 		'checkbox', 
				title : 	cmsmasters_shortcodes.timetable_field_disable_event_url_title, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'1' : 	cmsmasters_shortcodes.choice_enable 
				} 
			}, 
			// Text align
			text_align : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.timetable_field_text_align_title, 
				descr : 	cmsmasters_shortcodes.timetable_field_text_align_descr, 
				def : 		'center', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'center' : 		cmsmasters_shortcodes.choice_center, 
							'left' : 		cmsmasters_shortcodes.choice_left, 
							'right' : 		cmsmasters_shortcodes.choice_right, 
				} 
			}, 
			// Id
			id : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.timetable_field_id_title, 
				descr : 	cmsmasters_shortcodes.timetable_field_id_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.timetable_field_id_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Row height (in px)
			row_height : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.timetable_field_row_height_title, 
				descr : 	"<span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.size_zero_note + "</span>", 
				def : 		'31', 
				required : 	false, 
				width : 	'number', 
				min : 		'0' 
			}, 
			// Timetable box background color
			box_bg_color : { 
				type : 		'rgba', 
				title : 	cmsmasters_shortcodes.timetable_field_box_bg_color_title, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Timetable box hover background color
			box_hover_bg_color : { 
				type : 		'rgba', 
				title : 	cmsmasters_shortcodes.timetable_field_box_hover_bg_color_title, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Timetable box text color
			box_txt_color : { 
				type : 		'rgba', 
				title : 	cmsmasters_shortcodes.timetable_field_box_txt_color_title, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Timetable box hover text color
			box_hover_txt_color : { 
				type : 		'rgba', 
				title : 	cmsmasters_shortcodes.timetable_field_box_hover_txt_color_title, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Timetable box hours text color
			box_hours_txt_color : { 
				type : 		'rgba', 
				title : 	cmsmasters_shortcodes.timetable_field_box_hours_txt_color_title, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Timetable box hours hover text color
			box_hours_hover_txt_color : { 
				type : 		'rgba', 
				title : 	cmsmasters_shortcodes.timetable_field_box_hours_hover_txt_color_title, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Row 1 style background color
			row1_bg_color : { 
				type : 		'rgba', 
				title : 	cmsmasters_shortcodes.timetable_field_row1_bg_color_title, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Row 1 style text color
			row1_txt_color : { 
				type : 		'rgba', 
				title : 	cmsmasters_shortcodes.timetable_field_row1_txt_color_title, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Row 2 style background color
			row2_bg_color : { 
				type : 		'rgba', 
				title : 	cmsmasters_shortcodes.timetable_field_row2_bg_color_title, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Row 2 style text color
			row2_txt_color : { 
				type : 		'rgba', 
				title : 	cmsmasters_shortcodes.timetable_field_row2_txt_color_title, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.classes_title, 
				descr : 	cmsmasters_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	};
}



// CMSMasters Custom Multiple Fields Shortcodes
var cmsmastersMultipleShortcodes = { 
	// Audio Link
	cmsmasters_audio : { 
		title : 	cmsmasters_shortcodes.audio, 
		pair : 		true, 
		content : 	'link', 
		visual : 	'<span class="cmsmasters_multiple_text">{{ data.link }}</span>', 
		def : 		"", 
		fields : { 
			// Audio Link
			link : { 
				type : 			'upload', 
				title : 		cmsmasters_shortcodes.audio_link_field_audio_link_title, 
				descr : 		cmsmasters_shortcodes.audio_link_field_audio_link_descr, 
				def : 			'', 
				required : 		true, 
				width : 		'full', 
				frame : 		'select', 
				library : 		'audio', 
				multiple : 		false, 
				description : 	false, 
				caption : 		false, 
				align : 		false, 
				link : 			false, 
				size : 			false 
			} 
		} 
	}, 
	
	
	// Client
	cmsmasters_client : { 
		title : 	cmsmasters_shortcodes.client_title, 
		pair : 		true, 
		content : 	'name', 
		visual : 	'<span class="cmsmasters_multiple_text">{{ data.name }}</span>', 
		def : 		"", 
		fields : { 
			// Name
			name : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.name, 
				descr : 	cmsmasters_shortcodes.client_field_name_descr, 
				def : 		'', 
				required : 	true, 
				width : 	'half' 
			}, 
			// Logo
			logo : { 
				type : 			'upload', 
				title : 		cmsmasters_shortcodes.client_field_logo_title, 
				descr : 		cmsmasters_shortcodes.client_field_logo_descr, 
				def : 			'', 
				required : 		true, 
				width : 		'half', 
				frame : 		'post', 
				library : 		'image', 
				multiple : 		false, 
				description : 	false, 
				caption : 		false, 
				align : 		false, 
				link : 			false, 
				size : 			false 
			}, 
			// Link
			link : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.link, 
				descr : 	cmsmasters_shortcodes.client_field_link_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'full' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.classes_title, 
				descr : 	cmsmasters_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	}, 
	
	
	// Counter
	cmsmasters_counter : { 
		title : 	cmsmasters_shortcodes.counter_title, 
		pair : 		true, 
		content : 	'title', 
		visual : 	'<span class="cmsmasters_multiple_text {{ data.icon }}">{{ data.title }} &nbsp; {{ data.value }}</span>', 
		def : 		"", 
		fields : { 
			// Title
			title : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.title, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Subtitle
			subtitle : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.counter_subtitle, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Counter Value
			value : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.counter_field_counter_value_title, 
				descr : 	'', 
				def : 		'0', 
				required : 	true, 
				width : 	'number', 
				min : 		'0' 
			}, 
			// Counter Value Prefix
			value_prefix : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.counter_field_counter_value_prefix_title, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'small' 
			}, 
			// Counter Value Suffix
			value_suffix : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.counter_field_counter_value_suffix_title, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'small' 
			}, 
			// Counter Custom Color
			color : { 
				type : 		'rgba', 
				title : 	cmsmasters_shortcodes.counter_field_counter_color_title, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Icon Type
			icon_type : { 
				type : 		'radio', 
				title : 	cmsmasters_shortcodes.icon_type, 
				descr : 	'', 
				def : 		'icon', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'icon' : 	cmsmasters_shortcodes.icon, 
							'image' : 	cmsmasters_shortcodes.image 
				} 
			}, 
			// Icon
			icon : { 
				type : 		'icon', 
				title : 	cmsmasters_shortcodes.icon, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	cmsmasters_composer_icons(), 
				depend : 	'icon_type:icon' 
			}, 
			// Image
			image : { 
				type : 			'upload', 
				title : 		cmsmasters_shortcodes.image, 
				descr : 		'', 
				def : 			'', 
				required : 		false, 
				width : 		'half', 
				frame : 		'post', 
				library : 		'image', 
				multiple : 		false, 
				description : 	false, 
				caption : 		false, 
				align : 		false, 
				link : 			false, 
				size : 			false, 
				depend : 		'icon_type:image' 
			}, 
			// Icon Color
			icon_color : { 
				type : 		'rgba', 
				title : 	cmsmasters_shortcodes.counter_field_icon_color_title, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Icon Background Color
			icon_bg_color : { 
				type : 		'rgba', 
				title : 	cmsmasters_shortcodes.counter_field_icon_bg_color_title, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Icon Border Color
			icon_bd_color : { 
				type : 		'rgba', 
				title : 	cmsmasters_shortcodes.counter_field_icon_bd_color_title, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.classes_title, 
				descr : 	cmsmasters_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	}, 
	
	
	// Google Map Marker
	cmsmasters_google_map_marker : { 
		title : 	cmsmasters_shortcodes.map_marker_title, 
		pair : 		true, 
		content : 	'html', 
		visual : 	'<span class="cmsmasters_multiple_text"><span class="cmsmasters_multiple_hide_empty">{{ data.address }}</span><span class="cmsmasters_multiple_hide_empty">{{ data.latitude }} {{ data.longitude }}</span></span>', 
		def : 		"", 
		fields : { 
			// Address Type
			address_type : { 
				type : 		'radio', 
				title : 	cmsmasters_shortcodes.map_marker_field_address_type_title, 
				descr : 	cmsmasters_shortcodes.map_marker_field_address_type_descr, 
				def : 		'address', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'address' : 		cmsmasters_shortcodes.map_markers_field_address_type_choice_address, 
							'coordinates' : 	cmsmasters_shortcodes.map_markers_field_address_type_choice_coord 
				} 
			}, 
			// Address
			address : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.map_markers_field_address_title, 
				descr : 	cmsmasters_shortcodes.map_marker_field_address_descr, 
				def : 		'', 
				required : 	true, 
				width : 	'half', 
				depend : 	'address_type:address' 
			}, 
			// Latitude
			latitude : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.map_markers_field_latitude_title, 
				descr : 	cmsmasters_shortcodes.map_marker_field_latitude_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.value_number + "</span>", 
				def : 		'', 
				required : 	true, 
				width : 	'small', 
				depend : 	'address_type:coordinates' 
			}, 
			// Longitude
			longitude : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.map_markers_field_longitude_title, 
				descr : 	cmsmasters_shortcodes.map_marker_field_longitude_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.value_number + "</span>", 
				def : 		'', 
				required : 	true, 
				width : 	'small', 
				depend : 	'address_type:coordinates' 
			}, 
			// Popup HTML
			html : { 
				type : 		'textarea', 
				title : 	cmsmasters_shortcodes.map_marker_field_popup_html_title, 
				descr : 	cmsmasters_shortcodes.map_marker_field_popup_html_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Popup Visibility
			popup : { 
				type : 		'checkbox', 
				title : 	cmsmasters_shortcodes.map_marker_field_popup_visibility_title, 
				descr : 	cmsmasters_shortcodes.map_marker_field_popup_visibility_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'true' : 	cmsmasters_shortcodes.choice_show 
				} 
			} 
		} 
	}, 
	
	
	// Icon List Item
	cmsmasters_icon_list_item : { 
		title : 	cmsmasters_shortcodes.icon_list_item_title, 
		pair : 		true, 
		content : 	'content', 
		visual : 	'<span class="cmsmasters_multiple_text {{ data.icon }}">{{ data.title }}</span>', 
		def : 		"", 
		fields : { 
			// Icon
			icon : { 
				type : 		'icon', 
				title : 	cmsmasters_shortcodes.icon, 
				descr : 	cmsmasters_shortcodes.icon_list_item_field_icon_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	cmsmasters_composer_icons() 
			}, 
			// Image
			image : { 
				type : 			'upload', 
				title : 		cmsmasters_shortcodes.image, 
				descr : 		cmsmasters_shortcodes.icon_list_item_field_image_descr, 
				def : 			'', 
				required : 		false, 
				width : 		'half', 
				frame : 		'post', 
				library : 		'image', 
				multiple : 		false, 
				description : 	false, 
				caption : 		false, 
				align : 		false, 
				link : 			false, 
				size : 			false 
			}, 
			// Title
			title : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.title, 
				descr : 	cmsmasters_shortcodes.icon_list_item_field_title_descr, 
				def : 		'', 
				required : 	true, 
				width : 	'half' 
			}, 
			// Content
			content : { 
				type : 		'editor', 
				title : 	cmsmasters_shortcodes.content, 
				descr : 	cmsmasters_shortcodes.icon_list_item_field_content_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.icon_list_item_field_content_descr_note + "</span>", 
				def : 		"<p>" + cmsmasters_shortcodes.def_text + "</p>", 
				required : 	false, 
				width : 	'full' 
			}, 
			// Color
			color : { 
				type : 		'rgba', 
				title : 	cmsmasters_shortcodes.icon_list_item_field_item_color_title, 
				descr : 	cmsmasters_shortcodes.icon_list_item_field_color_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.icon_list_item_field_content_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.classes_title, 
				descr : 	cmsmasters_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	}, 
	
	
	// Pricing Table Offer
	cmsmasters_pricing_table_item : { 
		title : 	cmsmasters_shortcodes.pricing_offer_title, 
		pair : 		true, 
		content : 	'title', 
		visual : 	'<span class="cmsmasters_multiple_text">{{ data.title }} &nbsp; {{ data.currency }}{{ data.price }}<sup class="cmsmasters_multiple_hide_empty">{{ data.coins }}</sup></span>', 
		def : 		"", 
		fields : { 
			// Title
			title : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.title, 
				descr : 	cmsmasters_shortcodes.pricing_offer_field_title_descr, 
				def : 		'', 
				required : 	true, 
				width : 	'half' 
			}, 
			// Price
			price : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.pricing_offer_field_price_title, 
				descr : 	cmsmasters_shortcodes.pricing_offer_field_price_descr, 
				def : 		'', 
				required : 	true, 
				width : 	'small' 
			}, 
			// Coins
			coins : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.pricing_offer_field_coins_title, 
				descr : 	cmsmasters_shortcodes.pricing_offer_field_coins_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'small' 
			}, 
			// Currency
			currency : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.pricing_offer_field_currency_title, 
				descr : 	cmsmasters_shortcodes.pricing_offer_field_currency_descr, 
				def : 		'', 
				required : 	true, 
				width : 	'small' 
			}, 
			// Period
			period : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.pricing_offer_field_period_title, 
				descr : 	cmsmasters_shortcodes.pricing_offer_field_period_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'small' 
			}, 
			// Features
			features : { 
				type : 		'link', 
				title : 	cmsmasters_shortcodes.pricing_offer_field_features_title, 
				descr : 	cmsmasters_shortcodes.pricing_offer_field_features_descr, 
				def : 		"", 
				required : 	false, 
				width : 	'full' 
			}, 
			// Best Offer
			best : { 
				type : 		'checkbox', 
				title : 	cmsmasters_shortcodes.pricing_offer_field_best_offer_title, 
				descr : 	cmsmasters_shortcodes.pricing_offer_field_best_offer_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'true' : 	cmsmasters_shortcodes.choice_enable
				} 
			}, 
			// Best offer Color
			best_bg_color : { 
				type : 		'rgba', 
				title : 	cmsmasters_shortcodes.pricing_offer_field_best_offer_bg_title, 
				descr : 	cmsmasters_shortcodes.pricing_offer_field_best_offer_bg_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.clear_color_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				depend : 	'best:true' 
			}, 
			// Best offer Text Color
			best_text_color : { 
				type : 		'rgba', 
				title : 	cmsmasters_shortcodes.pricing_offer_field_best_offer_txt_title, 
				descr : 	cmsmasters_shortcodes.pricing_offer_field_best_offer_txt_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.clear_color_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				depend : 	'best:true' 
			}, 
			// Button Show
			button_show : { 
				type : 		'checkbox', 
				title : 	cmsmasters_shortcodes.button_field_show_title, 
				descr : 	cmsmasters_shortcodes.button_field_show_descr, 
				def : 		'false', 
				required : 	false, 
				width : 	'half',  
				choises : { 
							'true' : 	cmsmasters_shortcodes.choice_show 
				} 
			}, 
			// Button Title
			button_title : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.button_field_label_title, 
				descr : 	cmsmasters_shortcodes.button_field_label_descr, 
				def : 		cmsmasters_shortcodes.button, 
				required : 	false, 
				width : 	'half', 
				depend : 	'button_show:true' 
			}, 
			// Button Link
			button_link : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.button_field_link_title, 
				descr : 	cmsmasters_shortcodes.button_field_link_descr, 
				def : 		'', 
				required : 	true, 
				width : 	'half', 
				depend : 	'button_show:true' 
			}, 
			// Button Target
			button_target : { 
				type : 		'radio', 
				title : 	cmsmasters_shortcodes.button_field_target_title, 
				descr : 	cmsmasters_shortcodes.button_field_target_descr, 
				def : 		'self', 
				required : 	false, 
				width : 	'half',  
				choises : { 
							'self' : 	cmsmasters_shortcodes.link_target_choice_self, 
							'blank' : 	cmsmasters_shortcodes.link_target_choice_blank 
				}, 
				depend : 	'button_show:true' 
			}, 
			// Button Style
			button_style : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.button_field_style_title, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'' : 									cmsmasters_shortcodes.choice_default, 
							'cmsmasters_but_bg_hover' : 					'cmsmasters_but_bg_hover', 
							'cmsmasters_but_bg_slide_left' : 			'cmsmasters_but_bg_slide_left', 
							'cmsmasters_but_bg_slide_right' : 			'cmsmasters_but_bg_slide_right', 
							'cmsmasters_but_bg_slide_top' : 				'cmsmasters_but_bg_slide_top', 
							'cmsmasters_but_bg_slide_bottom' : 			'cmsmasters_but_bg_slide_bottom', 
							'cmsmasters_but_bg_expand_vert' : 			'cmsmasters_but_bg_expand_vert', 
							'cmsmasters_but_bg_expand_hor' : 			'cmsmasters_but_bg_expand_hor', 
							'cmsmasters_but_bg_expand_diag' : 			'cmsmasters_but_bg_expand_diag', 
							'cmsmasters_but_shadow' : 					'cmsmasters_but_shadow', 
							'cmsmasters_but_icon_dark_bg' : 				'cmsmasters_but_icon_dark_bg', 
							'cmsmasters_but_icon_light_bg' : 			'cmsmasters_but_icon_light_bg', 
							'cmsmasters_but_icon_divider' : 				'cmsmasters_but_icon_divider', 
							'cmsmasters_but_icon_inverse' : 				'cmsmasters_but_icon_inverse', 
							'cmsmasters_but_icon_slide_left' : 			'cmsmasters_but_icon_slide_left', 
							'cmsmasters_but_icon_slide_right' : 			'cmsmasters_but_icon_slide_right', 
							'cmsmasters_but_icon_hover_slide_left' : 	'cmsmasters_but_icon_hover_slide_left', 
							'cmsmasters_but_icon_hover_slide_right' : 	'cmsmasters_but_icon_hover_slide_right', 
							'cmsmasters_but_icon_hover_slide_top' : 		'cmsmasters_but_icon_hover_slide_top', 
							'cmsmasters_but_icon_hover_slide_bottom' : 	'cmsmasters_but_icon_hover_slide_bottom' 
				}, 
				depend : 	'button_show:true' 
			}, 
			// Button Google Font
			button_font_family : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.button_field_label_google_font_title, 
				descr : 	cmsmasters_shortcodes.button_field_label_google_font_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.button_field_label_google_font_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	cmsmasters_composer_fonts(), 
				depend : 	'button_show:true' 
			}, 
			// Button Font Size
			button_font_size : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.button_field_label_font_size_title, 
				descr : 	cmsmasters_shortcodes.button_field_label_font_size_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.button_field_label_font_size_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				depend : 	'button_show:true' 
			}, 
			// Button Line Height
			button_line_height : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.button_field_label_line_hight_title, 
				descr : 	cmsmasters_shortcodes.button_field_label_line_height_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.button_field_label_line_height_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				depend : 	'button_show:true' 
			}, 
			// Button Font Weight
			button_font_weight : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.button_field_label_font_weight_title, 
				descr : 	cmsmasters_shortcodes.button_field_label_font_weight_descr, 
				def : 		'normal', 
				required : 	false, 
				width : 	'half', 
				choises : 	cmsmasters_composer_font_weight(), 
				depend : 	'button_show:true' 
			}, 
			// Button Font Style
			button_font_style : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.button_field_label_font_style_title, 
				descr : 	cmsmasters_shortcodes.button_field_label_font_style_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	cmsmasters_composer_font_style(), 
				depend : 	'button_show:true' 
			}, 
			// Button Left & Right Paddings
			button_padding_hor : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.button_field_paddings_title, 
				descr : 	cmsmasters_shortcodes.button_field_paddings_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.button_field_paddings_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				depend : 	'button_show:true' 
			}, 
			// Button Border Width
			button_border_width : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.button_field_border_width_title, 
				descr : 	cmsmasters_shortcodes.button_field_border_width_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.size_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				max : 		'20', 
				depend : 	'button_show:true' 
			}, 
			// Button Border Style
			button_border_style : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.button_field_border_style_title, 
				descr : 	'', 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : { 
							'solid' : 	cmsmasters_shortcodes.choice_solid, 
							'dotted' : 	cmsmasters_shortcodes.choice_dotted, 
							'dashed' : 	cmsmasters_shortcodes.choice_dashed, 
							'double' : 	cmsmasters_shortcodes.choice_double, 
							'groove' : 	cmsmasters_shortcodes.choice_groove, 
							'ridge' : 	cmsmasters_shortcodes.choice_ridge, 
							'inset' : 	cmsmasters_shortcodes.choice_inset, 
							'outset' : 	cmsmasters_shortcodes.choice_outset 
				}, 
				depend : 	'button_show:true' 
			}, 
			// Button Border Radius
			button_border_radius : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.button_field_border_radius_title, 
				descr : 	cmsmasters_shortcodes.button_field_border_radius_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.border_radius_descr_note_1 + " <br />" + cmsmasters_shortcodes.border_radius_descr_note_2 + " <a href=\"http://www.css3generator.in/border-radius.html\" target=\"_blank\">" + cmsmasters_shortcodes.border_radius_descr_note_3 + "</a>. <br />" + cmsmasters_shortcodes.border_radius_descr_note_4 + " <a href=\"http://screencast.com/t/krCXdo0NN\" target=\"_blank\">" + cmsmasters_shortcodes.border_radius_descr_note_5 + "</a>.</span>", 
				def : 		'', 
				required : 	false, 
				depend : 	'button_show:true' 
			}, 
			// Button Background Color
			button_bg_color : { 
				type : 		'rgba', 
				title : 	cmsmasters_shortcodes.button_field_bg_color_title, 
				descr : 	cmsmasters_shortcodes.button_field_bg_color_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.clear_color_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				depend : 	'button_show:true' 
			}, 
			// Button Text Color
			button_text_color : { 
				type : 		'rgba', 
				title : 	cmsmasters_shortcodes.button_field_txt_color_title, 
				descr : 	cmsmasters_shortcodes.button_field_txt_color_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.clear_color_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				depend : 	'button_show:true' 
			}, 
			// Button Border Color
			button_border_color : { 
				type : 		'rgba', 
				title : 	cmsmasters_shortcodes.button_field_bd_color_title, 
				descr : 	cmsmasters_shortcodes.button_field_bd_color_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.clear_color_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				depend : 	'button_show:true' 
			}, 
			// Button Background Color on Mouseover
			button_bg_color_h : { 
				type : 		'rgba', 
				title : 	cmsmasters_shortcodes.button_field_bg_color_h_title, 
				descr : 	cmsmasters_shortcodes.button_field_bg_color_h_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.clear_color_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				depend : 	'button_show:true' 
			}, 
			// Button Text Color on Mouseover
			button_text_color_h : { 
				type : 		'rgba', 
				title : 	cmsmasters_shortcodes.button_field_txt_color_h_title, 
				descr : 	cmsmasters_shortcodes.button_field_txt_color_h_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.clear_color_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				depend : 	'button_show:true' 
			}, 
			// Button Border Color on Mouseover
			button_border_color_h : { 
				type : 		'rgba', 
				title : 	cmsmasters_shortcodes.button_field_bd_color_h_title, 
				descr : 	cmsmasters_shortcodes.button_field_bd_color_h_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.clear_color_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				depend : 	'button_show:true' 
			}, 
			// Button Icon
			button_icon : { 
				type : 		'icon', 
				title : 	cmsmasters_shortcodes.button_field_icon_title, 
				descr : 	cmsmasters_shortcodes.button_field_icon_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'full', 
				choises : 	cmsmasters_composer_icons(), 
				depend : 	'button_show:true' 
			}, 
			// CSS3 Animation
			animation : { 
				type : 		'select', 
				title : 	cmsmasters_shortcodes.animation_title, 
				descr : 	cmsmasters_shortcodes.animation_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.animation_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				choises : 	get_animations() 
			}, 
			// Animation Delay
			animation_delay : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.animation_delay_title, 
				descr : 	cmsmasters_shortcodes.animation_delay_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.animation_delay_descr_note + "</span>", 
				def : 		'0', 
				required : 	false, 
				width : 	'number', 
				min : 		'0', 
				step : 		'50' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.classes_title, 
				descr : 	cmsmasters_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	}, 
	
	
	// Progress Bar
	cmsmasters_stat : { 
		title : 	cmsmasters_shortcodes.prog_bar_title, 
		pair : 		true, 
		content : 	'title', 
		visual : 	'<span class="cmsmasters_multiple_text {{ data.icon }}">{{ data.title }}</span>', 
		def : 		"", 
		fields : { 
			// Title
			title : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.title, 
				descr : 	cmsmasters_shortcodes.prog_bar_field_title_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Subtitle
			subtitle : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.prog_bar_subtitle, 
				descr : 	cmsmasters_shortcodes.prog_bar_field_subtitle_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Progress
			progress : { 
				type : 		'range', 
				title : 	cmsmasters_shortcodes.prog_bar_field_progress_title, 
				descr : 	cmsmasters_shortcodes.prog_bar_field_progress_descr, 
				def : 		'0', 
				required : 	true, 
				width : 	'number', 
				min : 		'0', 
				max : 		'100' 
			}, 
			// Icon
			icon : { 
				type : 		'icon', 
				title : 	cmsmasters_shortcodes.icon, 
				descr : 	cmsmasters_shortcodes.prog_bar_field_icon_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'full', 
				choises : 	cmsmasters_composer_icons() 
			}, 
			// Bar Color
			color : { 
				type : 		'rgba', 
				title : 	cmsmasters_shortcodes.prog_bar_field_bar_color_title, 
				descr : 	cmsmasters_shortcodes.prog_bar_field_bar_color_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.classes_title, 
				descr : 	cmsmasters_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	}, 
	
	
	// Quote
	cmsmasters_quote : { 
		title : 	cmsmasters_shortcodes.quote_title, 
		pair : 		true, 
		content : 	'content', 
		visual : 	'<span class="cmsmasters_multiple_text">Quote by: {{ data.name }}</span>', 
		def : 		"", 
		fields : { 
			// Image
			image : { 
				type : 			'upload', 
				title : 		cmsmasters_shortcodes.quote_field_image_title, 
				descr : 		cmsmasters_shortcodes.quote_field_image_descr, 
				def : 			'', 
				required : 		false, 
				width : 		'half', 
				frame : 		'post', 
				library : 		'image', 
				multiple : 		false, 
				description : 	true, 
				caption : 		true, 
				align : 		false, 
				link : 			false, 
				size : 			true 
			}, 
			// Name
			name : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.name, 
				descr : 	cmsmasters_shortcodes.quote_field_name_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Subtitle
			subtitle : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.quote_field_subtitle_title, 
				descr : 	cmsmasters_shortcodes.quote_field_subtitle_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Quote
			content : { 
				type : 		'editor', 
				title : 	cmsmasters_shortcodes.quote_field_quote_title, 
				descr : 	cmsmasters_shortcodes.quote_field_quote_descr, 
				def : 		"<p>" + cmsmasters_shortcodes.def_text + "</p>", 
				required : 	true, 
				width : 	'full' 
			},
			// Website Link
			link : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.quote_field_link_title, 
				descr : 	cmsmasters_shortcodes.quote_field_link_descr, 
				def : 		"", 
				required : 	false, 
				width : 	'full' 
			}, 
			// Website Name
			website : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.quote_field_website_name_title, 
				descr : 	cmsmasters_shortcodes.quote_field_website_name_descr, 
				def : 		"", 
				required : 	false, 
				width : 	'half' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.classes_title, 
				descr : 	cmsmasters_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	}, 
	
	
	// Tab
	cmsmasters_tab : { 
		title : 	cmsmasters_shortcodes.tab_title, 
		pair : 		true, 
		content : 	'content', 
		visual : 	'<span class="cmsmasters_multiple_text {{ data.icon }}">{{ data.title }}</span>', 
		def : 		"", 
		fields : { 
			// Title
			title : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.title, 
				descr : 	cmsmasters_shortcodes.tab_field_title_descr, 
				def : 		'', 
				required : 	true, 
				width : 	'half' 
			}, 
			// Content
			content : { 
				type : 		'editor', 
				title : 	cmsmasters_shortcodes.content, 
				descr : 	cmsmasters_shortcodes.tab_field_content_descr, 
				def : 		"<p>" + cmsmasters_shortcodes.def_text + "</p>", 
				required : 	true, 
				width : 	'full' 
			}, 
			// Custom Tab Selector Color
			custom_colors : { 
				type : 		'checkbox', 
				title : 	cmsmasters_shortcodes.tab_field_tab_selector_color_title, 
				descr : 	cmsmasters_shortcodes.tab_field_tab_selector_color_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half',  
				choises : { 
							'true' : cmsmasters_shortcodes.choice_enable 
				} 
			}, 
			// Tab Color
			bg_color : { 
				type : 		'rgba', 
				title : 	cmsmasters_shortcodes.tab_field_tab_color_title, 
				descr : 	cmsmasters_shortcodes.tab_field_tab_color_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half', 
				depend : 	'custom_colors:true' 
			}, 
			// Icon
			icon : { 
				type : 		'icon', 
				title : 	cmsmasters_shortcodes.icon, 
				descr : 	cmsmasters_shortcodes.tab_field_icon_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'full', 
				choises : 	cmsmasters_composer_icons() 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.classes_title, 
				descr : 	cmsmasters_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	}, 
	
	
	// Toggle
	cmsmasters_toggle : { 
		title : 	cmsmasters_shortcodes.toggle_title, 
		pair : 		true, 
		content : 	'content', 
		visual : 	'<span class="cmsmasters_multiple_text">{{ data.title }}</span>', 
		def : 		"", 
		fields : { 
			// Title
			title : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.title, 
				descr : 	cmsmasters_shortcodes.toggle_field_title_descr, 
				def : 		'', 
				required : 	true, 
				width : 	'half' 
			}, 
			// Content
			content : { 
				type : 		'editor', 
				title : 	cmsmasters_shortcodes.content, 
				descr : 	cmsmasters_shortcodes.toggle_field_title_descr, 
				def : 		"<p>" + cmsmasters_shortcodes.def_text + "</p>", 
				required : 	true, 
				width : 	'full' 
			}, 
			// Toggle Tags
			tags : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.toggle_field_toggle_tags_title, 
				descr : 	cmsmasters_shortcodes.toggle_field_toggle_tags_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' +  cmsmasters_shortcodes.toggle_field_toggle_tags_descr_note + "</span>", 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.classes_title, 
				descr : 	cmsmasters_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	}, 
	
	
	// Video Link
	cmsmasters_video : { 
		title : 	cmsmasters_shortcodes.video_link_title, 
		pair : 		true, 
		content : 	'link', 
		visual : 	'<span class="cmsmasters_multiple_text">{{ data.link }}</span>', 
		def : 		"", 
		fields : { 
			// Video Link
			link : { 
				type : 			'upload', 
				title : 		cmsmasters_shortcodes.video_link_field_video_link_title, 
				descr : 		cmsmasters_shortcodes.video_link_field_video_link_descr, 
				def : 			'', 
				required : 		true, 
				width : 		'full', 
				frame : 		'select', 
				library : 		'video', 
				multiple : 		false, 
				description : 	false, 
				caption : 		false, 
				align : 		false, 
				link : 			false, 
				size : 			false 
			} 
		} 
	} 
};


// CMSMasters Editor Shortcodes
cmsmastersEditorShortcodes = { 
	// Dropcap
	cmsmasters_dropcap : { 
		title : 	cmsmasters_shortcodes.dropcap_title, 
		icon : 		'admin-icon-dropcap', 
		pair : 		true, 
		content : 	'content', 
		visual : 	'<div>{{ data.content }}</div>', 
		multiple : 	false, 
		def : 		"A", 
		fields : { 
			// Content
			content : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.content, 
				descr : 	cmsmasters_shortcodes.dropcap_field_content_descr, 
				def : 		'A', 
				required : 	true, 
				width : 	'small' 
			}, 
			// Type
			type : { 
				type : 		'radio', 
				title : 	cmsmasters_shortcodes.dropcap_field_type_title, 
				descr : 	cmsmasters_shortcodes.dropcap_field_type_descr, 
				def : 		'type1', 
				required : 	true, 
				width : 	'half', 
				choises : { 
							'type1' : 	cmsmasters_shortcodes.dropcap_field_type_choice_one, 
							'type2' : 	cmsmasters_shortcodes.dropcap_field_type_choice_two 
				} 
			}, 
			// Additional Classes
			classes : { 
				type : 		'input', 
				title : 	cmsmasters_shortcodes.classes_title, 
				descr : 	cmsmasters_shortcodes.classes_descr, 
				def : 		'', 
				required : 	false, 
				width : 	'half' 
			} 
		} 
	} 
};


// CMSMasters Item Shortcode
cmsmastersLinkShortcode = { 
	title : 	cmsmasters_shortcodes.item_title, 
	content : 	false, 
	fields : { 
		// Title
		title : { 
			type : 		'input', 
			title : 	cmsmasters_shortcodes.title, 
			descr : 	cmsmasters_shortcodes.item_field_title_descr, 
			def : 		'', 
			required : 	true, 
			width : 	'half' 
		}, 
		// Link
		link : { 
			type : 		'input', 
			title : 	cmsmasters_shortcodes.link, 
			descr : 	cmsmasters_shortcodes.item_field_link_descr, 
			def : 		'', 
			required : 	false, 
			width : 	'full' 
		}, 
		// Icon
		icon : { 
			type : 		'icon', 
			title : 	cmsmasters_shortcodes.icon, 
			descr : 	cmsmasters_shortcodes.item_field_icon_descr, 
			def : 		'', 
			required : 	false, 
			width : 	'full', 
			choises : 	cmsmasters_composer_icons() 
		} 
	} 
};


// CMSMasters Column Shortcode
cmsmastersColumn = { 
	title : 	cmsmasters_shortcodes.column_title, 
	content : 	false, 
	fields : { 
		// CSS3 Animation
		animation : { 
			type : 		'select', 
			title : 	cmsmasters_shortcodes.animation_title, 
			descr : 	cmsmasters_shortcodes.column_field_animation_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.animation_descr_note + "</span>", 
			def : 		'', 
			required : 	false, 
			width : 	'half', 
			choises : 	get_animations() 
		}, 
		// Animation Delay
		animation_delay : { 
			type : 		'input', 
			title : 	cmsmasters_shortcodes.animation_delay_title, 
			descr : 	cmsmasters_shortcodes.column_field_animation_delay_descr + " <br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.animation_delay_descr_note + "</span>", 
			def : 		'0', 
			required : 	false, 
			width : 	'number', 
			min : 		'0', 
			step : 		'50' 
		}, 
		// Additional Classes
		classes : { 
			type : 		'input', 
			title : 	cmsmasters_shortcodes.classes_title, 
			descr : 	cmsmasters_shortcodes.column_field_classes_descr, 
			def : 		'', 
			required : 	false, 
			width : 	'half' 
		} 
	} 
};


// CMSMasters Row Shortcode
cmsmastersRow = { 
	button :	cmsmasters_shortcodes.row_button, 
	title :		cmsmasters_shortcodes.row_title, 
	icon : 		'admin-icon-row', 
	content : 	false, 
	fields : { 
		// Content Width
		width : { 
			type : 		'radio', 
			title : 	cmsmasters_shortcodes.row_field_content_width_title, 
			descr : 	cmsmasters_shortcodes.row_field_content_width_descr, 
			def : 		'boxed', 
			required : 	false, 
			width : 	'half', 
			choises : { 
						'boxed' : 		cmsmasters_shortcodes.row_field_content_width_choice_boxed, 
						'fullwidth' : 	cmsmasters_shortcodes.row_field_content_width_choice_custom 
			} 
		}, 
		// Left Custom Padding
		padding_left : { 
			type : 		'input', 
			title : 	cmsmasters_shortcodes.row_field_left_custom_padding_title, 
			descr : 	cmsmasters_shortcodes.row_field_left_custom_padding_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.size_note_percentage + "</span>", 
			def : 		'3', 
			required : 	false, 
			width : 	'number', 
			min : 		'0', 
			max : 		'100', 
			depend : 	'width:fullwidth' 
		}, 
		// Right Custom Padding
		padding_right : { 
			type : 		'input', 
			title : 	cmsmasters_shortcodes.row_field_right_custom_padding_title, 
			descr : 	cmsmasters_shortcodes.row_field_right_custom_padding_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.size_note_percentage + "</span>", 
			def : 		'3', 
			required : 	false, 
			width : 	'number', 
			min : 		'0', 
			max : 		'100', 
			depend : 	'width:fullwidth' 
		}, 
		// Content Width No Margin
		no_margin : { 
			type : 		'checkbox', 
			title : 	cmsmasters_shortcodes.row_field_no_margin_title, 
			descr : 	cmsmasters_shortcodes.row_field_no_margin_descr, 
			def : 		'', 
			required : 	false, 
			width : 	'half', 
			choises : { 
					'true' : 	cmsmasters_shortcodes.choice_enable 
			} 
		}, 
		// Merge with the Next Section
		merge : { 
			type : 		'checkbox', 
			title : 	cmsmasters_shortcodes.row_field_merge_title, 
			descr : 	cmsmasters_shortcodes.row_field_merge_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.row_field_merge_descr_note + "</span>", 
			def : 		'', 
			required : 	false, 
			width : 	'half', 
			choises : { 
						'true' : 	cmsmasters_shortcodes.choice_enable 
			} 
		}, 
		// Top Style
		top_style : { 
			type : 		'select', 
			title : 	cmsmasters_shortcodes.row_field_top_style_title, 
			descr : 	cmsmasters_shortcodes.row_field_top_style_descr, 
			def : 		'default', 
			required : 	false, 
			width : 	'half', 
			choises : { 
						'default' : 		cmsmasters_shortcodes.row_field_choice_default, 
						'left_diagonal' : 	cmsmasters_shortcodes.row_field_choice_left_diagonal, 
						'right_diagonal' : 	cmsmasters_shortcodes.row_field_choice_right_diagonal, 
						'zigzag' : 			cmsmasters_shortcodes.row_field_choice_zigzag, 
						'triangle' : 		cmsmasters_shortcodes.row_field_choice_triangle 
			} 
		}, 
		
		// Bottom Style
		bot_style : { 
			type : 		'select', 
			title : 	cmsmasters_shortcodes.row_field_bot_style_title, 
			descr : 	cmsmasters_shortcodes.row_field_bot_style_descr, 
			def : 		'default', 
			required : 	false, 
			width : 	'half', 
			choises : { 
						'default' : 		cmsmasters_shortcodes.row_field_choice_default, 
						'left_diagonal' : 	cmsmasters_shortcodes.row_field_choice_left_diagonal, 
						'right_diagonal' : 	cmsmasters_shortcodes.row_field_choice_right_diagonal, 
						'zigzag' : 			cmsmasters_shortcodes.row_field_choice_zigzag, 
						'triangle' : 		cmsmasters_shortcodes.row_field_choice_triangle 
			} 
		}, 
		// Color Scheme
		color : { 
			type : 		'select', 
			title : 	cmsmasters_shortcodes.row_field_color_scheme_title, 
			descr : 	cmsmasters_shortcodes.row_field_color_scheme_descr, 
			def : 		'default', 
			required : 	false, 
			width : 	'half', 
			choises : 	cmsmasters_composer_colors() 
		}, 
		// Background Color
		bg_color : { 
			type : 		'rgba', 
			title : 	cmsmasters_shortcodes.background_color, 
			descr : 	cmsmasters_shortcodes.row_field_bg_color_descr, 
			def : 		'', 
			required : 	false, 
			width : 	'half' 
		}, 
		// Background Image
		bg_img : { 
			type : 			'upload', 
			title : 		cmsmasters_shortcodes.row_field_bg_image_title, 
			descr : 		cmsmasters_shortcodes.row_field_bg_image_descr, 
			def : 			'', 
			required : 		false, 
			width : 		'half', 
			frame : 		'post', 
			library : 		'image', 
			multiple : 		false, 
			description : 	false, 
			caption : 		false, 
			align : 		false, 
			link : 			false, 
			size : 			true 
		}, 
		// Background Position
		bg_position : { 
			type : 		'select', 
			title : 	cmsmasters_shortcodes.row_field_bg_position_title, 
			descr : 	cmsmasters_shortcodes.row_field_bg_position_descr, 
			def : 		'top center', 
			required : 	false, 
			width : 	'half', 
			choises : { 
						'top left' : 		cmsmasters_shortcodes.row_field_bg_position_choice_vert_top + ' - ' + cmsmasters_shortcodes.row_field_bg_position_choice_horiz_left, 
						'top center' : 		cmsmasters_shortcodes.row_field_bg_position_choice_vert_top + ' - ' + cmsmasters_shortcodes.row_field_bg_position_choice_horiz_center, 
						'top right' : 		cmsmasters_shortcodes.row_field_bg_position_choice_vert_top + ' - ' + cmsmasters_shortcodes.row_field_bg_position_choice_horiz_right, 
						'center left' : 	cmsmasters_shortcodes.row_field_bg_position_choice_vert_center + ' - ' + cmsmasters_shortcodes.row_field_bg_position_choice_horiz_left, 
						'center center' : 	cmsmasters_shortcodes.row_field_bg_position_choice_vert_center + ' - ' + cmsmasters_shortcodes.row_field_bg_position_choice_horiz_center, 
						'center right' : 	cmsmasters_shortcodes.row_field_bg_position_choice_vert_center + ' - ' + cmsmasters_shortcodes.row_field_bg_position_choice_horiz_right, 
						'bottom left' : 	cmsmasters_shortcodes.row_field_bg_position_choice_vert_bottom + ' - ' + cmsmasters_shortcodes.row_field_bg_position_choice_horiz_left, 
						'bottom center' : 	cmsmasters_shortcodes.row_field_bg_position_choice_vert_bottom + ' - ' + cmsmasters_shortcodes.row_field_bg_position_choice_horiz_center, 
						'bottom right' : 	cmsmasters_shortcodes.row_field_bg_position_choice_vert_bottom + ' - ' + cmsmasters_shortcodes.row_field_bg_position_choice_horiz_right 
			}, 
			depend : 	'bg_img:!' 
		}, 
		// Background Repeat
		bg_repeat : { 
			type : 		'radio', 
			title : 	cmsmasters_shortcodes.row_field_bg_repeat_title, 
			descr : 	cmsmasters_shortcodes.row_field_bg_repeat_descr, 
			def : 		'no-repeat', 
			required : 	false, 
			width : 	'half', 
			choises : { 
						'no-repeat' : 	cmsmasters_shortcodes.row_field_bg_repeat_choice_none, 
						'repeat-x' : 	cmsmasters_shortcodes.row_field_bg_repeat_choice_horiz, 
						'repeat-y' : 	cmsmasters_shortcodes.row_field_bg_repeat_choice_vert, 
						'repeat' : 		cmsmasters_shortcodes.row_field_bg_repeat_choice_repeat 
			}, 
			depend : 	'bg_img:!' 
		}, 
		// Background Attachment
		bg_attachment : { 
			type : 		'radio', 
			title : 	cmsmasters_shortcodes.row_field_bg_attachement_title, 
			descr : 	cmsmasters_shortcodes.row_field_bg_attachement_descr, 
			def : 		'scroll', 
			required : 	false, 
			width : 	'half', 
			choises : { 
						'scroll' : 	cmsmasters_shortcodes.row_field_bg_attachement_choice_scroll, 
						'fixed' : 	cmsmasters_shortcodes.row_field_bg_attachement_choice_fixed 
			}, 
			depend : 	'bg_img:!' 
		}, 
		// Background Size
		bg_size : { 
			type : 		'radio', 
			title : 	cmsmasters_shortcodes.row_field_bg_size_title, 
			descr : 	cmsmasters_shortcodes.row_field_bg_size_descr + "<br /><span>" + cmsmasters_shortcodes.row_field_bg_size_choice_auto + ': ' + cmsmasters_shortcodes.row_field_bg_size_descr_auto + "<br />" + cmsmasters_shortcodes.row_field_bg_size_choice_cover + ': ' + cmsmasters_shortcodes.row_field_bg_size_descr_cover + "<br />" + cmsmasters_shortcodes.row_field_bg_size_choice_contain + ': ' + cmsmasters_shortcodes.row_field_bg_size_descr_contain + "</span>", 
			def : 		'cover', 
			required : 	false, 
			width : 	'half', 
			choises : { 
						'auto' : 		cmsmasters_shortcodes.row_field_bg_size_choice_auto, 
						'cover' : 		cmsmasters_shortcodes.row_field_bg_size_choice_cover, 
						'contain' : 	cmsmasters_shortcodes.row_field_bg_size_choice_contain 
			}, 
			depend : 	'bg_img:!' 
		}, 
		// Background Parallax
		bg_parallax : { 
			type : 		'checkbox', 
			title : 	cmsmasters_shortcodes.row_field_bg_parallax_title, 
			descr : 	cmsmasters_shortcodes.row_field_bg_parallax_descr, 
			def : 		'', 
			required : 	false, 
			width : 	'half', 
			choises : { 
						'true' : 	cmsmasters_shortcodes.choice_enable 
			}, 
			depend : 	'bg_img:!' 
		}, 
		// Background Parallax Ratio
		bg_parallax_ratio : { 
			type : 		'input', 
			title : 	cmsmasters_shortcodes.row_field_bg_parallax_ratio_title, 
			descr : 	cmsmasters_shortcodes.row_field_bg_parallax_ratio_descr, 
			def : 		'0.5', 
			required : 	false, 
			width : 	'number', 
			min : 		'0.05', 
			max : 		'1', 
			step : 		'0.05', 
			depend : 	'bg_img:!' 
		}, 
		// Color Overlay
		color_overlay : { 
			type : 		'rgba', 
			title : 	cmsmasters_shortcodes.row_field_color_overlay_title, 
			descr : 	cmsmasters_shortcodes.row_field_color_overlay_descr, 
			def : 		'', 
			required : 	false, 
			width : 	'half' 
		}, 
		// Top Padding
		padding_top : { 
			type : 		'input', 
			title : 	cmsmasters_shortcodes.row_field_top_padding_title, 
			descr : 	cmsmasters_shortcodes.row_field_top_padding_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.size_note_short + ' ' + cmsmasters_shortcodes.value_zero + "</span>", 
			def : 		'0', 
			required : 	false, 
			width : 	'number', 
			min : 		'0' 
		}, 
		// Bottom Padding
		padding_bottom : { 
			type : 		'input', 
			title : 	cmsmasters_shortcodes.row_field_bottom_padding_title, 
			descr : 	cmsmasters_shortcodes.row_field_bottom_padding_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.size_note_short + ' ' + cmsmasters_shortcodes.value_zero + "</span>", 
			def : 		'50', 
			required : 	false, 
			width : 	'number', 
			min : 		'0' 
		}, 
		// Section ID
		id : { 
			type : 		'input', 
			title : 	cmsmasters_shortcodes.row_field_section_id_title, 
			descr : 	cmsmasters_shortcodes.row_field_section_id_descr + "<br /><span>" + cmsmasters_shortcodes.note + ' ' + cmsmasters_shortcodes.row_field_section_id_descr_note + "<span>", 
			def : 		'', 
			required : 	false, 
			width : 	'small' 
		}, 
		// Additional Classes
		classes : { 
			type : 		'input', 
			title : 	cmsmasters_shortcodes.classes_title, 
			descr : 	cmsmasters_shortcodes.row_field_classes_descr, 
			def : 		'', 
			required : 	false, 
			width : 	'half' 
		} 
	} 
};


// CSS3 Animations List
function get_animations() { 
	return { 
		'' : 					'None', 
		'bounceIn' : 			'Bounce In', 
		'bounceInUp' : 			'Bounce In Up', 
		'bounceInDown' : 		'Bounce In Down', 
		'bounceInLeft' : 		'Bounce In Left', 
		'bounceInRight' : 		'Bounce In Right', 
		'fadeIn' : 				'Fade In', 
		'fadeInUp' : 			'Fade In Up', 
		'fadeInUpBig' : 		'Fade In Up Big', 
		'fadeInDown' : 			'Fade In Down', 
		'fadeInDownBig' : 		'Fade In Down Big', 
		'fadeInLeft' : 			'Fade In Left', 
		'fadeInLeftBig' : 		'Fade In Left Big', 
		'fadeInRight' : 		'Fade In Right', 
		'fadeInRightBig' : 		'Fade In Right Big', 
		'flipInX' : 			'Flip In X', 
		'flipInY' : 			'Flip In Y', 
		'rotateIn' : 			'Rotate In', 
		'rotateInUpLeft' : 		'Rotate In Up Left', 
		'rotateInUpRight' : 	'Rotate In Up Right', 
		'rotateInDownLeft' : 	'Rotate In Down Left', 
		'rotateInDownRight' : 	'Rotate In Down Right', 
		'slideInDown' : 		'Slide In Down', 
		'slideInLeft' : 		'Slide In Left', 
		'slideInRight' : 		'Slide In Right', 
		'rollIn' : 				'Roll In', 
		'bounce' : 				'Bounce', 
		'flash' : 				'Flash', 
		'pulse' : 				'Pulse', 
		'shake' : 				'Shake', 
		'swing' : 				'Swing', 
		'tada' : 				'Tada', 
		'wobble' : 				'Wobble', 
		'flip' : 				'Flip', 
		'lightSpeedIn' : 		'Light Speed In' 
	};
}


// Sidebar Layouts List
function get_layouts() { 
	return { 
		'' : 			'1/1', 
		'1212' : 		'1/2 + 1/2', 
		'1323' : 		'1/3 + 2/3', 
		'2313' : 		'2/3 + 1/3', 
		'1434' : 		'1/4 + 3/4', 
		'3414' : 		'3/4 + 1/4', 
		'131313' : 		'1/3 + 1/3 + 1/3', 
		'121414' : 		'1/2 + 1/4 + 1/4', 
		'141214' : 		'1/4 + 1/2 + 1/4', 
		'141412' : 		'1/4 + 1/4 + 1/2', 
		'14141414' : 	'1/4 + 1/4 + 1/4 + 1/4' 
	};
}

