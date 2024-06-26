@extends('layouts.app')



@section('title' ,'Calendar' )
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Calendar</title>
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</head>
<body>
    <br><br>
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
    @if(session('ajouter'))
        <div class="alert alert-success">
            {{ session('ajouter') }}
        </div>
    @endif
    @if(session('update'))
        <div class="alert alert-success">
            {{ session('update') }}
        </div>
    @endif
    <div class="loader" style="display: none"></div>
    
<!-- Modal -->
<div class="modal fade" id="calendarModel" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Calendar title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
            </div>
            <div class="modal-body">
                <form>
                    <input type="text" id="search_input" class="form-control" placeholder="Search Client" oninput="searchClient()">
                    <select class="form-control" id='client_id' name="client_id" onchange="showContact()" multiple>
                        <option value="" selected disabled>--- Client ---</option>
                        @foreach($calclient as $item)
                            <option value="{{$item->id}}">{{$item->nom}}</option>
                        @endforeach
                    </select>
                
                <script>
                    function searchClient() {
                        var searchQuery = document.getElementById('search_input').value.toLowerCase();
                        var options = document.getElementById('client_id').getElementsByTagName('option');
                        for (var i = 0; i < options.length; i++) {
                            var optionText = options[i].text.toLowerCase();
                            if (optionText.includes(searchQuery)) {
                                options[i].style.display = ''; 
                            } else {
                                options[i].style.display = 'none';
                            }
                        }
                    }
            
                    function showContact() {
                        var selectedClientId = document.querySelector("#client_id").value;
                        var contacts = {
                            @foreach($calclient as $client)
                                {{$client->id}}: [
                                    @foreach($client->contactte as $contact)
                                        {contact_id: {{$contact->contact_id}}, nom: '{{$contact->nom}}'},
                                    @endforeach
                                ],
                            @endforeach
                        };
            
                        var selectedContacts = contacts[selectedClientId];
                        var selectContactElement = document.getElementById("contact_id");
                        selectContactElement.innerHTML = "";
                        selectedContacts.forEach(function(contact) {
                            var option = document.createElement("option");
                            option.value = contact.contact_id;
                            //option.id = "contact_id";
                            option.text = contact.nom;
                            selectContactElement.appendChild(option);
                        });
                    }
                </script>
                <br>
                <select class="form-control" id='contact_id' name="contact_id">
                    <option value="" selected disabled>--- Contact ---</option>
                </select>
                <br>
                <input type="text" class="form-control" name="objectif" id="objectif" placeholder="objectif....">
                <br>
                <input type="time" class="form-control" id="date_h" placeholder="date_h ....">
                <br>
                <select name="type_visite" class="form-control" id="type_visite">
                    <option value="" selected disabled>--- type_visite ---</option>
                    @foreach ($v_type as $item)
                        <option value="{{ $item->type_visite }}">{{ $item->type_visite }}</option>
                    @endforeach
                </select>
            
            <div class="modal-footer d-flex justify-content-center">
                <button type="button" id="seveCalendar" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </form>
        </div>
        </div>
    </div>
</div>
<br><br><br><br>
<div class="d-flex gap-2">
    @foreach($v_type as $item)
        <div style="border-radius: 50%; width: 35px;height: 35px; background-color: {{$item->color}}"></div>
        <span>{{$item->type_visite}}</span>
    @endforeach
</div>

<div class="container">
    <div class="row">
        <div class="col">
            <div class="text-center mt-5">
                <div id="calendar" class="bg-white"></div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }

        });
        var calendr = @json($events);
        $('#calendar').fullCalendar({
            header: {
                left : 'prev, next today',
                center : 'title',
                right : 'month,list'
            },
            events: calendr,
            selectable: true,

            //eventColor: 'green',
            selectHelper: true,
            select: function(start, date_h, end, allDay){
                $('#calendarModel').modal('toggle');
                $('#seveCalendar').click(function(){
                    var title = $('#objectif').val();
                    var client_id = $('#client_id').find(":selected").val();
                    var contact_id = $('#contact_id').find(":selected").val();
                    var date_start = moment(start).format('YYYY-MM-DD');
                    var date_h = $('#date_h').val();
                    var type_visite = $('#type_visite').val();

                    $.ajax({
                        type: 'POST',
                        url: "{{ route('calendar.store') }}",
                        dataType: 'json',
                        data: {
                            objectif: title,
                            client_id: client_id,
                            contact_id: contact_id,
                            date_start: date_start,
                            date_h: date_h,
                            type_visite: type_visite
                            
                        },
                        beforeSend : function(){
                            $('.loader').show();
                        },
                        complete: function(){
                            $('.loader').hide();
                        },
                        success: function(response){
                            //console.log(response);
                            $('#calendarModel').modal('hide');
                            // $('.loader').show();
                            $('#calendar').fullCalendar('renderEvent', {
                                'id': response.id,
                                'title': response.objectif,
                                'client_id': response.client_id,
                                'contact_id': response.contact_id,
                                'start': response.date_start,
                                'date_h': response.date_h,
                                'type_visite': response.type_visite,
                            
                            });
                            window.location.reload();
                        },
                        error: function(error){
                            console.error(error);
                        }

                    });
                });
            },
            editable: true,
            eventClick: function(event) {
                $('.loader').show();
                var visiteId = event.id;
                if(event.icon == '&#10004;' || event.icon == '&#10008;' || event.icon == '&#x2BAB;'){
                    // confirm('test')
                    // $('.loader').hide();
                    window.location.href = `/calendar/detail/${visiteId}`
                }else{
                window.location.href = `/calendar/show/${visiteId}`;
                }
               },
               eventMouseover: function(event, jsEvent, view) {
                var startDate = moment(event.start).format('YYYY-MM-DD');
                $(this).tooltip({
                    title: "This is your title: " + event.title + '\n' + "Your start date: " + startDate,
                    placement: 'top', 
                    trigger: 'hover', 
                    container: 'body' 
                });
                },
            eventRender: function(event, element) {
                element.find('.fc-title').append("<br> " + event.icon);
            }
                
        });

    });
</script>
</body>
</html>
@endsection