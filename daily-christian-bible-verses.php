<?php
/*
Plugin Name: Daily Christian Bible Verses
Plugin URI: 
Description: Daily Christian Bible Verses for your reading from King James Version BIBLE to get Spiritual Growth for you on ALMIGHTY GOD using your WordPress Website.
Version: 1.0
Author: L.Ch.Rajkumar
Author URI: https://profiles.wordpress.org/lchrajkumar
License: GPL2

  Copyright 2014-2015  L.Ch.Rajkumar  (email : lchrajkumar@live.in)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

//Prefixing the Stylesheet for Daily Christian Bible Verses Plugin....
function prefix_add_my_stylesheet() {
	wp_register_style( 'prefix-style', plugins_url('daily-christian-bible-verses.css', __FILE__) );
	wp_enqueue_style( 'prefix-style' );
}
add_action( 'wp_enqueue_scripts', 'prefix_add_my_stylesheet' );

//function daily_christian_bible_verse($showlink, $book='Psalms', $chapter='1', $verse='1')
function daily_christian_bible_verse($showlink, $book='Psalms')
{
	$bookAdd='';
	if($book == 'Genesis')
	{
		$bookAdd = 'Genesis';
	}
	else if($book == 'Exodus')
	{
		$bookAdd = 'Exodus';
	}
	else if($book == 'Leviticus')
	{
		$bookAdd = 'Leviticus';
	}
	else if($book == 'Numbers')
	{
		$bookAdd = 'Numbers';
	}
	else if($book == 'Deuteronomy')
	{
		$bookAdd = 'Deuteronomy';
	}
	else if($book == 'Joshua')
	{
		$bookAdd = 'Joshua';
	}
	else if($book == 'Judges')
	{
		$bookAdd = 'Judges';
	}
	else if($book == 'Ruth')
	{
		$bookAdd = 'Ruth';
	}
	else if($book == '1 Samuel')
	{
		$bookAdd = '1+Samuel';
	}
	else if($book == '2+Samuel')
	{
		$bookAdd = '2 Samuel';
	}
	else if($book == '1 Kings')
	{
		$bookAdd = '1+Kings';
	}
	else if($book == '2 Kings')
	{
		$bookAdd = '2+Kings';
	}
	else if($book == '1 Chronicles')
	{
		$bookAdd = '1+Chronicles';
	}
	else if($book == '2 Chronicles')
	{
		$bookAdd = '2+Chronicles';
	}
	else if($book == 'Ezra')
	{
		$bookAdd = 'Ezra';
	}
	else if($book == 'Nehemiah')
	{
		$bookAdd = 'Nehemiah';
	}
	else if($book == 'Esther')
	{
		$bookAdd = 'Esther';
	}
	else if($book == 'Job')
	{
		$bookAdd = 'Job'; 
	}
	else if($book == 'Proverbs')
	{
		$bookAdd = 'Proverbs';
	}
	else if($book == 'Ecclesiastes')
	{
		$bookAdd = 'Ecclesiastes';
	}
	else if($book == 'Song Of Solomon')
	{
		$bookAdd = 'Song+Of+Solomon';
	}
	else if($book == 'Isaiah')
	{
		$bookAdd = 'Isaiah';
	}
	else if($book == 'Jeremiah')
	{
		$bookAdd = 'Jeremiah';
	}
	else if($book == 'Lamentations')
	{
		$bookAdd = 'Lamentations';
	}
	else if($book == 'Ezekiel')
	{
		$bookAdd = 'Ezekiel';
	}
	else if($book == 'Daniel')
	{
		$bookAdd = 'Daniel';
	}
	else if($book == 'Hosea')
	{
		$bookAdd = 'Hosea';
	}
	else if($book == 'Joel')
	{
		$bookAdd = 'Joel';
	}
	else if($book == 'Amos')
	{
		$bookAdd = 'Amos';
	}
	else if($book == 'Obadiah')
	{
		$bookAdd = 'Obadiah';
	}
	else if($book == 'Jonah')
	{
		$bookAdd = 'Jonah';
	}
	else if($book == 'Micah')
	{
		$bookAdd = 'Micah';
	}
	else if($book == 'Nahum')
	{
		$bookAdd = 'Nahum';
	}
	else if($book == 'Habakkuk')
	{
		$bookAdd = 'Habakkuk';
	}
	else if($book == 'Zephaniah')
	{
		$bookAdd = 'Zephaniah';
	}
	else if($book == 'Haggai')
	{
		$bookAdd = 'Haggai';
	}
	else if($book == 'Zechariah')
	{
		$bookAdd = 'Zechariah';
	}
	else if($book == 'Malachi')
	{
		$bookAdd = 'Malachi';
	}
	else 
	{	
		$book = 'Psalms';
	}	
	$verse = rand(1, 100);        //Randomizing the *BIBLE* VERSE
	$chapter = rand(1, 150);    //Randomizing the *BIBLE* CHAPTER
	$dailyBibleVerseOfTheDay_Book = get_option('dailyBibleVerseOfTheDay_Book' .$bookAdd);
	$dailyBibleVerseOfTheDay_Chapter = get_option('dailyBibleVerseOfTheDay_Chapter' .$chapter);
	$dailyBibleVerseOfTheDay_Verse = get_option('dailyBibleVerseOfTheDay_Verse' .$verse);
	
	if($dailyBibleVerseOfTheDay_Book == '')
	{	
		function filter_verse($verse){
		$contentText = '';
		$output = preg_match_all('/\<p>(.*)\<\/p\>/is',$verse,$matches);
		$verseText = isset($matches[1][0])?$matches[1][0]:'';
		return $verseText;		
		}
		$curl = curl_init();
		 curl_setopt($curl, CURLOPT_URL, 'http://www.kingjamesbibleonline.org/popular-bible-verses-widget.php');
		 curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		 curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
		 curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 60);
		 $verse = curl_exec($curl);
		if(!is_wp_error($verse)) 
		{
			$dailyBibleVerseOfTheDay_Verse = str_replace(',', '&#44;', $verse);
			update_option('dailyBibleVerseOfTheDay_' .$bookAdd .$chapter .$verse,$dailyBibleVerseOfTheDay_Chapter, $dailyBibleVerseOfTheDay_Verse);
		}
	
	}
	if($dailyBibleVerseOfTheDay_Verse == "")
	{
			$dailyBibleVerseOfTheDay_Verse = '<div id="versecontainer">Blessed is the man that walketh not in the counsel of the ungodly, nor standeth in the way of sinners, nor sitteth in the seat of the scornful.</div>
<div class="dailyKJVerses bibleVerse"><a href="http://www.kingjamesbibleonline.org/Psalms-1-1/" target="_blank">
Psalms 1:1</a></div>';
	}
	if($showlink == 'true' || $showlink == '1')
	{
		$html = $dailyBibleVerseOfTheDay_Verse . '<div class="dailyKJVerses linkToWebsite"><a href="http://www.kingjamesbibleonline.org" target="_blank">The Official King James Bible Online</a></div>';
	}
	else
	{
		$html = $dailyBibleVerseOfTheDay_Verse;
	}
	return $html;
}
//Adding shortcodes....
add_shortcode('dailychristianbibleverse', 'daily_christian_bible_verse');

//Adding Widget....
class ChristianBibleVerseWidget extends WP_Widget
{
	function ChristianBibleVerseWidget()
	{
		$widget_ops = array('classname' => 'ChristianBibleVerse', 'description' => 'Show the daily bible verse on your website!' );
		$this->WP_Widget('ChristianBibleVerseWidget', 'Daily Christian Bible Verse', $widget_ops);
	}
	 function form($instance)
	{
		$instance = wp_parse_args( (array) $instance, array( 'title' => 'Daily Christian Bible Verse' , 
		'showlink' => '1', 'book' => 'Psalms' ));
		$title = $instance['title'];
		$showlink = $instance['showlink'];
		$language = $instance['book'];
			
?>
<p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <br /><input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" /></label></p>
  <p><select id="<?php echo $this->get_field_id('book'); ?>" name="<?php echo $this->get_field_name('book'); ?>" ?>"><option value="Psalms" <?php _e($book == '' || $book == 'Psalms' ? 'selected' : ''); 
	?>>Psalms</option></select></p>

  <p><input id="<?php echo $this->get_field_id('showlink'); ?>" name="<?php echo $this->get_field_name('showlink'); ?>" type="checkbox" value="1" <?php checked( '1', $showlink ); ?>/><label for="<?php echo $this->get_field_id('showlink'); ?>"><?php _e('&nbsp;Show link to http://www.kingjamesbibleonline.org/ (thank you!)'); ?></label></p>
<?php
  }
	  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
    $instance['title'] = $new_instance['title'];
	if($new_instance['showlink'] == '1')
	{
		$instance['showlink'] = '1';
	}
	else
	{
		$instance['showlink'] = '0';
	}
	if($new_instance['chapter'] > '1')
	{
		$instance['chapter'] = "'.$chapter.'";
	}
	else
	{
		$instance['chapter'] = '1';
	}
	if($new_instance['verse'] > '1')
	{
		$instance['verse'] = "'.$verse.'";
	}
	else
	{
		$instance['verse'] = '1';
	}	
	if($new_instance['book'] == '')
	{
		$instance['book'] = 'Psalms';
	}
	else
	{
		$instance['book'] = $new_instance['book'];
	}
    return $instance;
  }
	function widget($args, $instance)
  {
    extract($args, EXTR_SKIP);
 
    echo $before_widget;
    $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
 
    if (!empty($title))
      echo $before_title . $title . $after_title;;
 
 	$showlink = $instance['showlink'];
	if($showlink == '')
	{
		$showlink = '1';
	}
	
	$language = $instance['book'];
	if($language == '')
	{
		$language = 'Psalms';
	}
	if($chapter == '')
	{
		$chapter = '1';
	}
	if($verse == '')
	{
		$verse = '1';
	}
	
    echo daily_christian_bible_verse($showlink, $book, $chapter, $verse);
 
    echo $after_widget;
  }
}
	
add_action( 'widgets_init', create_function('', 'return register_widget("ChristianBibleVerseWidget");') );	
?>
