<?php

class Html
{
    private $css = "";
    private $title = "Tiary";
    private $header = "<a href='index.php'><img src='images/view/tiary_header.png' id='header_logo'></a>";
    private $navigation = "";
    private $content = "";
	private $icon = "tiary.ico";
	private $script = "";

// ICON
	public function getIcon(){
		return "<link rel='shortcut icon' href='{$this->icon}'/>";
	}
    
// CSS    
    public function addCss($new){
    	$this->css .= $new;
    }
    public function getCss(){
    	return $this->css;
    }
    
// TITLE    
    public function setNewTitle($new){
    	$this->title = $new;
    }
    public function addTitle($new){
    	$this->title = $new . ' | '.$this->title;
    }
    public function getTitle(){
    	return $this->title;
    }
    
// HEADER
	public function clearHeader(){
		$this->header = "<a href='index.php'><img src='images/view/tiary_header.png' id='header_logo'></a>";
	}
	public function addToHeader($new){
		$this->header .= $new;
	}
	public function getHeader(){
		return $this->header;
	}
    
// NAVIGATION
	public function clearNavigation(){
		$this->navigation = "";
	}
	public function addToNavigation($new){
		$this->navigation .= $new;
	}
	public function getNavigation(){
		return $this->navigation;
	}
	
// CONTENET
	public function clearContent(){
		$this->content = "";
	}
	public function setContent($new){
		$this->content = $new;
	}
	public function addToContent($new){
		$this->content .= $new;
	}
	public function getContent() {
		return $this->content;
	}

// SCRIPT
	public function clearScript(){
		$this->script = "";
	}
	public function setScript($new){
		$this->script = $new;
	}
	public function addScript($new){
		$this->script .= $new;
	}
	public function getScripts(){
		return $this->script;
	}
}