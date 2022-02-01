<!--<iframe src="https://3d.cs.money/item/Yx6j1lz" width="700px" height="400px" webkitallowfullscreen allow='camera; gyroscope; accelerometer; magnetometer; fullscreen;' ></iframe> -->
    <div class="box">
    <div></div>
</div>

<div class="tile is-ancestor">
    <div class="tile is-4 is-vertical is-parent">
        <div class="account-image">
            <p class="title">Profile Image</p>
            <figure>
                <img class="is-rounded" src="url({{ url('assets/img/profile_image.jpg') }})" />
            </figure>
        </div>
        <div class="account-credentials-container">
            <p class="title">Credentials</p>
            <div class="account-credentials">
                <table class="table" id="account-table">
                    <tbody>
                        <tr>
                            <th>Name</th>
                            <td>{{ $item["name"] }}</td>
                        </tr>
                        <tr>
                            <th>Surname</th>
                            <td>{{ $item["surname"] }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $item["email"] }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="tile is-parent">
        <div class="account-transactions">
            <p class="title">Last Transactions</p>
        </div>
    </div>
</div>
