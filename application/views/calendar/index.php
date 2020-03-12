
    <script>
    $(document).ready(function(){
        var calendar = $('#calendar').fullCalendar({
            editable:true,
            header:{
                left:'prev,next today',
                center:'title',
                right:'month,agendaWeek,agendaDay'
            },
            events:"<?php echo base_url(); ?>calendar/load",
          

            
            eventClick:function(event)
            {
                    var id = event.id;
                    window.open("events/view/"+id, '_self');
            }
        });
    });
             
    </script>

        <div class="container">
            <div id="calendar"></div>
        </div>

        
        
