<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enquiry List | Moti Mala Maker</title>
    @include ('include.link')
    <meta name="robots" content="noindex, nofollow">

</head>

<body>
    @include ('include.nav')

    <!-- Main Content Area -->
    <main class="main-content">
        <div class="container-fluid">
            <form action="#" class="row mb-3">
                <div class="col-md-5">
                    <label for="search">Search</label>
                    <input type="search" class="form-control">
                </div>
                <div class="col-md-3">
                    <label for="from">Platform</label>
                    <select name="" id="" class="form-control form-select">
                        <option value="Select_Platform">Select Platform</option>
                        <option value="Facebook">Facebook</option>
                        <option value="instagram">Instagram</option>
                        <option value="website">website</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <label for="from">From</label>
                    <input type="datetime" class="form-control">
                </div>
                <div class="col-md-2">
                    <label for="from">To</label>
                    <input type="datetime" class="form-control">
                </div>

            </form>
            <div class="table-responsive scrollbar">
                <table class="table table-bordered bg-light">
                    <thead>
                        <tr>
                            <th colspan="6">Enquiry List</th>
                        </tr>

                        <tr>
                            <th>S.NO.</th>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Platform</th>
                            <th>Name</th>
                            <th scope="col">Number</th>
                            <th>Email</th>
                            <th scope="col">Location</th>
                            <th scope="col">Messages</th>
                        </tr>

                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>22-12-2024</td>
                            <td>10:00PM</td>
                            <td>Facebook</td>
                            <td>Neeraj Bora</td>
                            <td>neerajbora944@gmail.com</td>
                            <td>+91 9027339904</td>
                            <td>
                                Delhi
                            </td>
                            <td>
                                testing description
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </main>
    @include ('include.footer')
    @include ('include.script')


</body>

</html>
