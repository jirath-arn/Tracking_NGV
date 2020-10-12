@extends('layouts.index')

@section('content')
<div class="container"> <!-- class="container text-center" -->
    <div class="row">
        <!-- item left -->
        <div class="col col-lg-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="jumbotron">
                        <form action="#">
                            <!-- logo Thammasat
                            <img class="mb-4" src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/32/Emblem_of_Thammasat_University.svg/1200px-Emblem_of_Thammasat_University.svg.png" alt="" width="100" height="100"><br><br>
                            -->

                            <label for="currentPosition">Current position :</label>
                            <input type="text" id="currentPosition" class="form-control" placeholder="Current position" required autofocus><br>
                            
                            <label for="destination">Destination :</label>
                            <input type="text" id="destination" class="form-control" placeholder="Destination" required><br>
                            
                            <button class="btn btn-lg btn-primary btn-block" type="submit">Search</button>
                        </form>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="jumbotron">
                        <h4 class="h4 mb-3 font-weight-normal">List of bus</h4><br>

                        <div class="text-center">
                            No data
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- item right -->
        <div class="col col-lg-8">
            <div class="jumbotron">
                <div class="panel panel-default">
                    <div class="panel-heading">Map of Thammasat</div>

                    <div class="panel-body">
                        <p align="center"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3870.1303009669746!2d100.6011034143148!3d14.069481993644184!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30e27fecb1e8d73f%3A0xe114a07c97a9a674!2sThammasat%20University%20Rangsit%20Center!5e0!3m2!1sen!2sth!4v1600868954806!5m2!1sen!2sth" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe></p>
                    </div>
                </div>
            </div>    
        </div>
    </div>
</div>
@endsection
