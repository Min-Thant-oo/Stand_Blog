@props(['contactmessages'])
<x-adminlayout.layout>

    <x-adminform.flashnoti :success="session('success')" />

    <div class="m-4 p-4 ">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-center card-title"><strong class="text-xl">Contact Messages</strong></h1>
        </div>
        <form action="/admin/contact-messages" class="d-flex flex-col flex-sm-row gap-sm-3" method="GET">
            <div class="d-flex flex-col flex-1 col-md- form-group">
                <label for="search">Search</label>
                <input type="text" name="search" value="{{request('search')}}" class="form-control rounded-md" placeholder="Please enter to search">
            </div>
            <div class="d-flex flex-col justify-content-center col-md- flex-0">
                <button type="submit" class="btn btn-primary px-2 py-2 text-white text-base bg-primary">Filter</button>
            </div>
        </form>
    
        <table class="table table-hover border-t">
            <thead>
              <tr>
                <th scope="col"><strong>#</strong></th>
                <th scope="col"><strong>Name</strong></th>
                <th scope="col"><strong>Email</strong></th>
                <th scope="col"><strong>Subject</strong></th>
                <th scope="col"><strong>Message</strong></th>
                <th scope="col"><strong>Messaged at</strong></th>
                <th scope="col"><strong>Actions</strong></th>
              </tr>
            </thead>
            <tbody>
              @forelse ($contactmessages->reverse() as $index => $contactmessage)
                <tr>
                  <td style="width: 50px;" scope="row">{{$index + 1}}</td>
                  <td>{{$contactmessage->name}}</td>
                  <td>
                    <a class="text-primary" href="mailto:{{$contactmessage->email}}">{{$contactmessage->email}}</a>
                  </td>
                  <td>{{$contactmessage->subject}}</td>
                  <td>{{\Illuminate\Support\Str::limit($contactmessage->message, 30)}}</td>
                  <td>{{$contactmessage->created_at->format('Y-m-d')}}</td>
                  <td class="d-flex gap-2">
                    <button type="button" class="btn btn-primary bg-primary" data-bs-toggle="modal" data-bs-target="#myModal{{ $contactmessage->id }}">View</button>
                    <form action="/admin/contact-messages/{{$contactmessage->id}}/delete" method="post" onsubmit="return confirm('Are you sure you want to delete?');">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="btn btn-danger bg-danger text-white">Delete</button>
                    </form>
                  </td>
                </tr>
                <div class="modal fade" id="myModal{{ $contactmessage->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content " style="margin-top: ;" >
                          <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel"><strong>Message Info</strong></h5>
                          </div>
                          
                          <div class="modal-body">
                              <strong>Name</strong> - {{$contactmessage->name}}
                          </div>
                          <div class="modal-body">
                            <strong>Email</strong> - <a href="mailto:{{$contactmessage->email}}" class="text-primary">{{$contactmessage->email}}</a>
                            
                          </div>
                          <div class="modal-body">
                            <strong>Subject</strong> - {{$contactmessage->subject}}
                          </div>
                          <div class="modal-body">
                            <strong>Message</strong> - <div class="text-justify">{{$contactmessage->message}}</div>
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-secondary bg-primary" data-bs-dismiss="modal">Close</button>
                          </div>
                      </div>
                  </div>
                </div>
                @empty
                <tr>
                    <td colspan="7" class="border border-white ">
                        <h1 class="text-center text-xl">No Contact Message Found</h1>
                    </td>
                </tr>
              @endforelse
            </tbody>
        </table>
        
        {{$contactmessages->links()}}
      
    </div>
</x-adminlayout.layout>