<!DOCTYPE html>
<?php
$qrypsn=mysql_query("SELECT * 
FROM  `pemesanan`,`paket`
where pemesanan.id_paket=paket.id_paket");
?>
<html>
    <head>
<link href="css/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="css/fullcalendar/fullcalendar.print.css" rel="stylesheet" type="text/css" media='print' />
    </head>
    <body class="skin-blue">
        <!-- header logo: style can be found in header.less -->
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar --

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Calendar
                        <small>Control panel</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Calendar</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="box box-primary">
                                <div class="box-body no-padding">
                                    <!-- THE CALENDAR -->
                                    <div id="calendar"></div>
                                </div><!-- /.box-body -->
                            </div><!-- /. box -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->


                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->


        <!-- jQuery 2.0.2 -->
        <script src="/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <!-- jQuery UI 1.10.3 -->
        <!--<script src="/js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>-->
        <!-- Bootstrap -->
        <!--<script src="/js/bootstrap.min.js" type="text/javascript"></script>-->
        <!-- AdminLTE App -->
        <!--<script src="/js/AdminLTE/app.js" type="text/javascript"></script>-->
        <!-- AdminLTE for demo purposes -->
        <!--<script src="/js/AdminLTE/demo.js" type="text/javascript"></script>-->        
        <!-- fullCalendar -->
       <!--<script src="/js/plugins/fullcalendar/fullcalendar.min.js" type="text/javascript"></script>-->
        <!-- Page specific script -->
        <script type="text/javascript">
            $(function() {

                /* initialize the external events
                 -----------------------------------------------------------------*/
                function ini_events(ele) {
                    ele.each(function() {

                        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
                        // it doesn't need to have a start or end
                        var eventObject = {
                            title: $.trim($(this).text()) // use the element's text as the event title
                        };

                        // store the Event Object in the DOM element so we can get to it later
                        $(this).data('eventObject', eventObject);

                        // make the event draggable using jQuery UI
                        $(this).draggable({
                            zIndex: 1070,
                            revert: true, // will cause the event to go back to its
                            revertDuration: 0  //  original position after the drag
                        });

                    });
                }
                ini_events($('#external-events div.external-event'));

                /* initialize the calendar
                 -----------------------------------------------------------------*/
                //Date for the calendar events (dummy data)
                var date = new Date();
                var d = date.getDate(),
                        m = date.getMonth(),
                        y = date.getFullYear();
                $('#calendar').fullCalendar({
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay'
                    },
                    buttonText: {//This is to add icons to the visible buttons
                        prev: "<span class='fa fa-caret-left'></span>",
                        next: "<span class='fa fa-caret-right'></span>",
                        today: 'today',
                        month: 'month',
                        week: 'week',
                        day: 'day'
                    },
                    //Random default events
                    events: [
                       <?php while($cetakpesan=mysql_fetch_array($qrypsn)){
                        $hari=$cetakpesan['tanggal_mulai'];
                    ?>
                        {
                            title: '<?php echo $cetakpesan['nama_paket'];echo $cetakpesan['user_id'];?>',
                            start: new Date(y, m, 1),
                            end: new Date(y, m, 2),
                            backgroundColor: "#f56954", //red
                            borderColor: "#f56954" //red
                        },
                    <?php }?>
                    ],
                    editable: true,
                    droppable: true, // this allows things to be dropped onto the calendar !!!
                    drop: function(date, allDay) { // this function is called when something is dropped

                        // retrieve the dropped element's stored Event Object
                        var originalEventObject = $(this).data('eventObject');

                        // we need to copy it, so that multiple events don't have a reference to the same object
                        var copiedEventObject = $.extend({}, originalEventObject);

                        // assign it the date that was reported
                        copiedEventObject.start = date;
                        copiedEventObject.allDay = allDay;
                        copiedEventObject.backgroundColor = $(this).css("background-color");
                        copiedEventObject.borderColor = $(this).css("border-color");

                        // render the event on the calendar
                        // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
                        $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

                        // is the "remove after drop" checkbox checked?
                        if ($('#drop-remove').is(':checked')) {
                            // if so, remove the element from the "Draggable Events" list
                            $(this).remove();
                        }

                    }
                });

                /* ADDING EVENTS */
                var currColor = "#f56954"; //Red by default
                //Color chooser button
                var colorChooser = $("#color-chooser-btn");
                $("#color-chooser > li > a").click(function(e) {
                    e.preventDefault();
                    //Save color
                    currColor = $(this).css("color");
                    //Add color effect to button
                    colorChooser
                            .css({"background-color": currColor, "border-color": currColor})
                            .html($(this).text()+' <span class="caret"></span>');
                });
                $("#add-new-event").click(function(e) {
                    e.preventDefault();
                    //Get value and make sure it is not null
                    var val = $("#new-event").val();
                    if (val.length == 0) {
                        return;
                    }

                    //Create event
                    var event = $("<div />");
                    event.css({"background-color": currColor, "border-color": currColor, "color": "#fff"}).addClass("external-event");
                    event.html(val);
                    $('#external-events').prepend(event);

                    //Add draggable funtionality
                    ini_events(event);

                    //Remove event from text input
                    $("#new-event").val("");
                });
            });
        </script>

    </body>
</html>
