<!-- Button trigger modal -->
<a  href="" data-bs-toggle="modal"
    data-bs-target="#exampleModal{{$Testimonial->uuid}}"><i class="fa fa-solid fa-eye"></i>View Image</a>




  <!-- Modal -->
  <div class="modal fade" id="exampleModal{{$Testimonial->uuid}}" tabindex="-1" aria-labelledby="exampleModal{{$Testimonial->uuid}}Label" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModal{{$Testimonial->uuid}}Label">Modal title</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" align="center">
          <img style="width: 400px" src="/assets/images/Testimonial/{{$Testimonial->image}}" alt="none">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
