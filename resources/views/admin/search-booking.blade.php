<div class="mt-3 mb-2">
    <h5 class="">Search Booking</h5>
    <form class="form-inline" method="POST" action="/booking/search">
        @csrf
        <label for="description">Name</label>
        <input type="text" class="form-control mx-3" name="name" placeholder="Name">
        <br>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
