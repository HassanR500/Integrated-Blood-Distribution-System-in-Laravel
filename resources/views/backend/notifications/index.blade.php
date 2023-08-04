@extends('backend.layouts.app')
@section('title','Requests')
@section('content')
<script>
  var isNewRequestReceived = {{ $isNewRequestReceived ? 'true' : 'false'}};

  if(isNewRequestReceived){
    document.getElementById('notoficationModal').innerHTML="Anew Request has been received";
  }
</script>

@foreach($notifications as $notification)

<div class="modal fade" id="notificationModal" tabindex="-1" role="dialog" aria-labelledby="notificationModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id = "notificationModalLabel">New Request Notification</h5>
        <button type="button" class = "close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="notification-item">
    <h4>{{ $notification->data['message'] }}</h4>
    
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class = "btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endforeach

{{ $notifications->links() }}

@endsection