<div class="fixed-bottom d-flex justify-content-center">
    <div
     id="call-server" 
     class="position-relative d-flex justify-content-center  align-items-center "
     style="width:70px;height:70px;background-color:red;border-radius:50%;bottom:10px;"
data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo"
     >
<img src="img/ringing.png" color="white" height="32px" width="32px" alt="" srcset="">
    </div>
</div>

<div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Appel au serveur </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form action="contr.php" method="post" >

          <div class="mb-3 ">
            <label for="recipient-name" class="col-form-label">Coordination: <span class="text-danger">*</span> </label>
            <div class="d-flex justify-content-around pt-3 pb-2">


<input type="radio" class="btn-check" name="type" id="option1" value="table" autocomplete="off" checked>
<label class="btn btn-outline-primary w-25" for="option1">Table</label>

<input type="radio" class="btn-check" name="type" id="option2" value="chambre" autocomplete="off">
<label class="btn btn-outline-primary w-25" for="option2">Chambre</label>




</div>
            <input type="text" class="form-control mt-3 " name="code" id="recipient-name" placeholder="Code">
          </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label">Message:(facultatif)</label>
            <textarea class="form-control" name="msg" id="message-text"></textarea>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        <button type="submit" name="call-server" class="btn btn-success">appeler le serveur</button></form>
      </div>
    </div>
  </div>
</div>