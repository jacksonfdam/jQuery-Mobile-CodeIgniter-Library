<?php defined('BASEPATH') or exit('No direct script access allowed');

// ## CodeIgniter jQuery Mobile Library
//
// Libreria para el desarrollo de versiones móviles de páginas con el framework
// jQuery Mobile.
//
// * **Package** - CodeIgniter
// * **Author** - Ferran Figueredo | [http://iqualit.com](http://iqualit.com)
// * **Copyright** - Copyright (c) 2011, iQualit S.L.
// * **License** - [http://codeigniter.com/user_guide/license.html](http://codeigniter.com/user_guide/license.html)
// * **Link** - [http://iqualit.com](http://iqualit.com)
// * **Version** - Version 0.1.2

class Mobile {

	var $CI;
	
	var $config;
	
	var $title;
	
	var $header;
	var $header_theme;	
	var $back_to;
	var $right_button;
	
	var $navbar;
	
	var $footer;
	
	function __construct()
	{
		$this->CI =& get_instance();
		$this->CI->load->helper('url');
		$this->CI->load->library('parser');
		$this->CI->config->load('mobile');
		$this->config = $this->CI->config->item('mobile');
	}

	public function header($title = '', $header_theme = NULL)
	{
		$this->header_theme = ($header_theme != NULL) ? $header_theme : $this->config['global_theme'];

		$this->title = $title;
		$this->header = '<h1>'.$title.'</h1>';
		
		return $this;
	}

	public function back_to($url = '', $title = NULL)
	{	
		if(isset($this->header))
		{
			$text = (isset($title))? $title : $this->config['backbtn_text'];

			$extra['title'] 	= $text;
			$extra['class'] 	= 'ui-btn-left';
			$extra['data-icon']	= 'arrow-l';
			$extra['data-rel']	= 'back';
			
			if($this->config['ajax_loaded'] == FALSE) { $extra['data-ajax'] = 'false'; }
							
			$this->back_to = anchor($url, $text, $extra);
		}

		return $this;
	}

	public function button($url = '', $title = 'Button', $icon = NULL)
	{
		if(isset($this->header))
		{
			$extra = (isset($icon)) ? array('data-icon' => $icon) : array();
			$extra['title'] = $title;
			$extra['class'] = 'ui-btn-right';
			
			if($this->config['ajax_loaded'] == FALSE) { $extra['data-ajax'] = 'false'; }
			
			$this->right_button = anchor($url, $title, $extra);
		}
		
		return $this;
	}
	    
	private function build_header()
	{
		$header = '';

		if(isset($this->header))
		{
			$header .= '<div data-role="header" id="header" data-theme="'.$this->header_theme.'" ';
			$header .= ($this->config['fixed_toolbars'] == TRUE ) ? 'data-position="fixed" ' : '';
			$header .= ($this->config['backbtn_auto'] 	== FALSE) ? 'data-backbtn="false" '  : '';
			$header .= '>';
			$header .= (isset($this->back_to)) ? $this->back_to : '';
			$header .= $this->header;
			$header .= (isset($this->right_button)) ? $this->right_button : '';
			$header .= '</div>';
		}
		
		return $header;
	}

	public function navbar($links = array(), $navbar_theme = NULL)
	{    
		if(!empty($links) AND is_array($links))
		{
			$this->navbar = '<div data-role="navbar"><ul>';
		
			foreach($links as $url => $link)
			{
				$extra['data-theme'] = (isset($navbar_theme)) ? $navbar_theme : $this->config['global_theme'];
				$extra['title'] 	 = $link;

				if($this->config['ajax_loaded'] == FALSE) { $extra['data-ajax'] = 'false'; }
				
				$this->navbar .= '<li>'.anchor($url, $link, $extra).'</li>';
			}
			
			$this->navbar .= '</ul></div>';
			
			return $this->navbar;
		}
		    	
		return FALSE;
	}

	public function footer($content = '', $footer_theme = NULL)
	{
		$footer = '<div data-role="footer" data-theme="';
		$footer .= (isset($footer_theme))? $footer_theme : $this->config['global_theme'];
		$footer .= '"';
		$footer .= ($this->config['fixed_toolbars'] == TRUE) ? 'data-position="fixed" ' : '';
		
		if(is_array($content))
		{
			$footer .= 'class="ui-bar"><div data-role="controlgroup" data-type="horizontal">';		
			foreach($content as $url => $link)
			{
				$extra['title'] 	= $link;
				$extra['data-role'] = 'button';
			
				$footer .= anchor($url, $link, $extra);
			}
			$footer .= '</div>';
		}
		else
		{
			$footer .= '><h4>'.$content.'</h4>';
		}
		
		$footer .= '</div>';
		
		$this->footer = $footer;
		
		return $this;
	}

	public function view($view = '', $data = array())
	{
		$data['page_title'] 	= $this->title;
		$data['global_theme'] 	= $this->config['global_theme'];
		$data['header'] 	= $this->build_header();
		$data['navbar'] 	= $this->navbar;
		$data['footer'] 	= $this->footer;
		$data['view'] 		= $view;
		    	
		$this->CI->parser->parse('mobile_template', $data);
	}
}

if(!function_exists('link_to'))
{
	function link_to($url = NULL, $title = 'Link', $data = array(), $transition = NULL)
	{
		$link_to = '';
	
		if(isset($url))
		{
			$CI =& get_instance();
			$CI->load->helper('url');
			$CI->config->load('mobile');
			$config = $CI->config->item('mobile');

			$extra 			= $data;
			$extra['title'] = $title;
			
			if($config['ajax_loaded'] == FALSE) $extra['data-ajax'] = 'false';
			
			$page_transtions = array('slide', 'slideup', 'slidedown', 'pop', 'fade', 'flip');
			$this_transition = (isset($transition))? $transition : $config['page_transitions'];
			
			$extra['data-transition'] = (in_array($this_transition, $page_transtions))? $this_transition : 'slide';
		
			$link_to = anchor($url, $title, $extra);
		}
		
		return $link_to;
	}
}

if(!function_exists('mail_to'))
{
	function mail_to($mail = NULL, $texto = NULL)
	{
		$mail_to = '';
		
		if(isset($mail))
		{
			$texto = (isset($texto)) ? $texto : $mail;
			$mail_to .= '<a href="mailto:'.$mail.'">'.$texto.'</a>';
		}
		
		return $mail_to;
	}
}

if(!function_exists('text_field'))
{
	function text_field($name = NULL, $texto = NULL, $placeholder = NULL)
	{
		$field = '';
		
		if(isset($name))
		{
			$label = (isset($texto))? $texto : $name;
		
			$field .= '<div data-role="fieldcontain"><label for="name">'.$label.':</label>';
			$field .= '<input type="text" name="'.$name.'" id="name" ';
			$field .= (isset($placeholder))? 'placeholder="'.$placeholder.'"' : '';
			$field .= ' /></div>';		
		}
		
		return $field;
	}
}

if(!function_exists('pass_field'))
{
	function pass_field($name = NULL, $texto = NULL, $placeholder = NULL)
	{
		$field = '';
		
		if(isset($name))
		{
			$label = (isset($texto))? $texto : $name;
		
			$field .= '<div data-role="fieldcontain"><label for="password">'.$label.':</label>';
			$field .= '<input type="password" name="'.$name.'" id="password" ';
			$field .= (isset($placeholder))? 'placeholder="'.$placeholder.'"' : '';
			$field .= ' /></div>';		
		}
		
		return $field;
	}
}
