<?php

function getHotelDetails($con) {
include './model/HotelModel.php';
$hotels = getAllHotels($con);

echo '<div class="hotel_list">';
    foreach ($hotels as $hotel) {
    echo '<a href="/flightbook/view/hotel-details.php" class="hotel_card_container">
        <div class="hotel_card">
            <img src="' . $hotel['image'] . '" alt="hotel Image">
            <h3>' . $hotel['hotel_name'] . ', <span class="hotel_city">' . $hotel['hotel_city'] . '</span></h3>

            <div class="hotel_desc">
                <img src="/flightbook/public/homeIcon.svg" alt="home icon">
                <p>Available Room : ' . $hotel['available_rooms'] . '/' . $hotel['total_rooms'] . '</p>
                <img src="/flightbook/public/starIcon.svg" alt="Star Icon">
                <img src="/flightbook/public/starIcon.svg" alt="Star Icon">
                <img src="/flightbook/public/starIcon.svg" alt="Star Icon">
                <img src="/flightbook/public/starIcon.svg" alt="Star Icon">
                <img src="/flightbook/public/starIcon.svg" alt="Star Icon">
            </div>

            <div class="hotel_price">
                <p>$' . $hotel['price'] . ' USD/
                    <small>night</small>
                </p>
            </div>
        </div>
    </a>';
    }
    echo '</div>';
}

?>