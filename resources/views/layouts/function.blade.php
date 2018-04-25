<?php
function get_calender_full($year = '',$month = '') 

{ 

$date_Year = ($year != '')?$year:date("Y"); 

$date_Month = ($month != '')?$month:date("m"); 

$date = $date_Year.'-'.$date_Month.'-01'; 

$current_Month_First_Day = date("N",strtotime($date)); 

$total_Days_ofMonth = cal_days_in_month(CAL_GREGORIAN,$date_Month,$date_Year); 

$total_Days_ofMonthDisplay = ($current_Month_First_Day == 7)?($total_Days_ofMonth):($total_Days_ofMonth + $current_Month_First_Day); 

$boxDisplay = ($total_Days_ofMonthDisplay <= 35)?35:42; 

?> 

<div id="calender_section"> 

<h2> 

         <a href="javascript:void(0);" onclick="get_calendar_data('calendar_div','<?php echo date("Y",strtotime($date.' - 1 Month')); ?>','<?php echo date("m",strtotime($date.' - 1 Month')); ?>');">&lt;</a> 

            <select name="month_dropdown" class="month_dropdown dropdown"><?php echo get_all_months__of_year($date_Month); ?></select> 

<select name="year_dropdown" class="year_dropdown dropdown"><?php echo get_year($date_Year); ?></select> 

            <a href="javascript:void(0);" onclick="get_calendar_data('calendar_div','<?php echo date("Y",strtotime($date.' + 1 Month')); ?>','<?php echo date("m",strtotime($date.' + 1 Month')); ?>');">&gt;</a> 

        </h2> 

<div id="event_list" class="modal"></div> 

        <!--Below Code for Event Add--> 

        <!-- The Modal --> 

<div id="event_add" class="modal"> 

  <div class="modal-content"> 

    <span class="close"><a href="#" onclick="close_popup('event_add')">×</a></span> 

     <p>Add Event on <span id="eventDateView"></span></p> 

            <p><b>Event Title: </b><input type="text" id="eventTitle" value=""/></p> 

            <input type="hidden" id="eventDate" value=""/> 

            <input type="button" id="add_event_informationBtn" value="Add"/> 

  </div> 

</div> 

        <div id="calender_section_top"> 

<ul> 

<li>SUN</li> 

<li>MON</li> 

<li>TUE</li> 

<li>WED</li> 

<li>THU</li> 

<li>FRI</li> 

<li>SAT</li> 

</ul> 

</div> 

<div id="calender_section_bot"> 

<ul> 

<?php 

$dayCount = 1; 

for($cb=1;$cb<=$boxDisplay;$cb++){ 

if(($cb >= $current_Month_First_Day+1 || $current_Month_First_Day == 7) && $cb <= ($total_Days_ofMonthDisplay)){ 

// Below javascript code for get current date 

$currentDate = $date_Year.'-'.$date_Month.'-'.$dayCount; 

$eventNum = 0; 

// Below line for including file of database connection file 

include 'connection.php'; 

// Below query useing for getting number of events in current date 

$result = $db->query("SELECT title FROM events WHERE date = '".$currentDate."' AND status = 1"); 

$eventNum = $result->num_rows; 

//Define date cell color 

if(strtotime($currentDate) == strtotime(date("Y-m-d"))){ 

echo '<li date="'.$currentDate.'" class="grey date_cell">'; 

}elseif($eventNum > 0){ 

echo '<li date="'.$currentDate.'" class="light_sky date_cell">'; 

}else{ 

echo '<li date="'.$currentDate.'" class="date_cell">'; 

} 

//Date cell 

echo '<span>'; 

echo '['.$dayCount.']'; 

echo '</span>'; 

//Hover event popup 

echo '<div id="date_popup_'.$currentDate.'" class="date_popup_wrap none">'; 

echo '<div class="date_window">'; 

echo '<div class="popup_event">Events ('.$eventNum.')</div>'; 

echo ($eventNum > 0)?'<a href="javascript:;" onclick="get_events_information(\''.$currentDate.'\');">View Events</a><br/>':''; 

//For Add Event 

echo '<a href="javascript:;" onclick="add_event_information(\''.$currentDate.'\');">Add Event</a>'; 

echo '</div></div>'; 

echo '</li>'; 

$dayCount++; 

?> 

<?php }else{ ?> 

<li><span>&nbsp;</span></li> 

<?php } } ?> 

</ul> 

</div> 

</div> 

<script type="text/javascript"> 

function get_calendar_data(target_div,year,month){ 

$.ajax({ 

type:'POST', 

url:'functions.php', 

data:'fun_type=get_calender_full&year='+year+'&month='+month, 

success:function(html){ 

$('#'+target_div).html(html); 

} 

}); 

} 

function get_events_information(date){ 

$.ajax({ 

type:'POST', 

url:'functions.php', 

data:'fun_type=get_events_information&date='+date, 

success:function(html){ 

$('#event_list').html(html); 

$('#event_add').slideUp('slow'); 

$('#event_list').slideDown('slow'); 

} 

}); 

} 

/* 

* function name add_event_information 

* Description :- Add Event inforation as per date wise 

* parameter :- date 

*/ 

function add_event_information(date){ 

$('#eventDate').val(date); 

$('#eventDateView').html(date); 

$('#event_list').slideUp('slow'); 

$('#event_add').slideDown('slow'); 

} 

/* 

*  below code used to save event information into database. and set message event created successfully. 

*/ 

$(document).ready(function(){ 

$('#add_event_informationBtn').on('click',function(){ 

var date = $('#eventDate').val(); 

var title = $('#eventTitle').val(); 

$.ajax({ 

type:'POST', 

url:'functions.php', 

data:'fun_type=add_event_information&date='+date+'&title='+title, 

success:function(msg){ 

if(msg == 'ok'){ 

var dateSplit = date.split("-"); 

$('#eventTitle').val(''); 

alert('Event Created.'); 

get_calendar_data('calendar_div',dateSplit[0],dateSplit[1]); 

}else{ 

alert('Sorry some issues please try again later.'); 

} 

} 

}); 

}); 

}); 

$(document).ready(function(){ 

$('.date_cell').mouseenter(function(){ 

date = $(this).attr('date'); 

$(".date_popup_wrap").fadeOut(); 

$("#date_popup_"+date).fadeIn();

}); 

$('.date_cell').mouseleave(function(){ 

$(".date_popup_wrap").fadeOut();

}); 

$('.month_dropdown').on('change',function(){ 

get_calendar_data('calendar_div',$('.year_dropdown').val(),$('.month_dropdown').val()); 

}); 

$('.year_dropdown').on('change',function(){ 

get_calendar_data('calendar_div',$('.year_dropdown').val(),$('.month_dropdown').val()); 

}); 

$(document).click(function(){ 

$('#event_list').slideUp('slow'); 

}); 

}); 

// Closed popup string

function close_popup(event_id) 

{ 

$('#'+event_id).css('display','none'); 

} 

</script> 

<?php 

} ?>