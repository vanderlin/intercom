@extends('base')

@section('scripts-head')
<script src="https://morning-sierra-80471.herokuapp.com/RTCMultiConnection.js"></script>
<script src="https://morning-sierra-80471.herokuapp.com/socket.io/socket.io.js"></script>

<style>
	.room-form {
		margin-top: 90px;
	}
</style>
@stop

@section('scripts-footer')

        <script>



            // ......................................................
            // .......................UI Code........................
            // ......................................................
            document.getElementById('join-room').onclick = function() {
                this.disabled = true;
                console.log("Join: ", document.getElementById('room-id').value);
                connection.openOrJoin(document.getElementById('room-id').value);
            };

            // ......................................................
            // ..................RTCMultiConnection Code.............
            // ......................................................
            var local = false;
            var connection = new RTCMultiConnection();
			connection.socketURL = local ? 'https://localhost:9001' : 'https://morning-sierra-80471.herokuapp.com:443/';

            document.getElementById('room-id').value = window.location.hash.substr(1) || connection.token();

            connection.session = {
                audio: true
            };

            connection.sdpConstraints.mandatory = {
                OfferToReceiveAudio: true,
                OfferToReceiveVideo: false
            };

			connection.onmessage = function(event) {
			    console.log(event);
			};

            var videosContainer = document.getElementById('connections-container');
            connection.onstream = function(event) {
            	console.log(event);
                videosContainer.appendChild(event.mediaElement);
            };
            console.log(connection);
        </script>
@stop


@section('content')
    <div class="container">
        <section class="room-form">
				<div class="form-group">
                	<input class="form-control" type="text" id="room-id" placeholder="Room Name" value="">
                </div>
                <div class="form-group">
                	<button class="form-control btn btn-default" id="join-room">Open Or Join Room</button>
            	</div>
        </section>

        <section id="connections-container">
        	
        </section>
    </div>
@stop