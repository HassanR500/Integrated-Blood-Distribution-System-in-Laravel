@extends('backend.layouts.app')
@section('title','Chat Room')
@section('content')
<section style="background-color: #eee;">
  <div class="container py-5">

    <div class="row">

      <div class="col-md-6 col-lg-5 col-xl-4 mb-4 mb-md-0">

        <h5 class="font-weight-bold mb-3 text-center text-lg-start">Member</h5>

        <div class="card">
          <div class="card-body">

            <form action="{{ url('chats') }}" method="post">
            {!! csrf_field() !!}
            <ul class="list-unstyled mb-0">
            @foreach($message as $item)
              <li class="p-2 border-bottom" style="background-color: #eee;">
                <a href="#!" class="d-flex justify-content-between">
                  <div class="d-flex flex-row">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-8.webp" alt="avatar"
                      class="rounded-circle d-flex align-self-center me-3 shadow-1-strong" width="60">
                    <div class="pt-1">
                      <p class="fw-bold mb-0">{{$item->user->name}}</p>
                      <p class="small text-muted">{{$item->message}}</p>
                    </div>
                  </div>
                  <div class="pt-1">
                    <p class="small text-muted mb-1">Just now</p>
                    <span class="badge bg-danger float-end">1</span>
                  </div>
                </a>
              </li>
              @endforeach
            </ul>

          </div>
        </div>

      </div>

      <div class="col-md-6 col-lg-7 col-xl-8">
      @foreach($message as $item)
        <ul class="list-unstyled">
          <li class="d-flex justify-content-between mb-4">
            <img src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/avatar-6.webp" alt="avatar"
              class="rounded-circle d-flex align-self-start me-3 shadow-1-strong" width="60">
            <div class="card">
              <div class="card-header d-flex justify-content-between p-3">
                <p class="fw-bold mb-0">{{$item->user->name}}</p>
                <p class="text-muted small mb-0"><i class="far fa-clock"></i> 12 mins ago</p>
              </div>
              <div class="card-body">
                <p class="mb-0">
                {{$item->message}}
                </p>
              </div>
            </div>
          </li>
        @endforeach
    
        <li class="bg-white mb-3">
            <div class="form-outline">
            <label class="form-label" for="message">Message</label>
              <textarea class="form-control" id="message" name="message" rows="4"></textarea>
              
            </div>
          </li>
          <button type="submit" class="btn btn-info btn-rounded float-end">Send</button>
        </ul>
        </form>
      </div>

    </div>

  </div>
</section>
@endsection