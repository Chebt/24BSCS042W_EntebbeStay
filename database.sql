-- Table 1: Hotels
CREATE TABLE hotels (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100),
    rating INT,
    location VARCHAR(100),
    services TEXT,
    available_space INT,
    website VARCHAR(255),
    image VARCHAR(100)
);
-- Table 2: Bookings
CREATE TABLE bookings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    hotel_id INT NOT NULL,
    user_name VARCHAR(100) NOT NULL,
    check_in DATE NOT NULL,
    check_out DATE NOT NULL,
    guests INT NOT NULL,
    booking_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (hotel_id) REFERENCES hotels(id)
);

INSERT INTO hotels (name, rating, location, services, available_space, website, image) VALUES
('Best Western Premier', 4, 'Manyago (Near Victoria Mall)',
 'Pool, Gym, Spa, WiFi', 25, 'https://bestwesternghe.co.ug', 'images/best_western_hotel.jpg'),
('K Hotels Entebbe', 4, 'Hill Road', 'Rooftop Lounge, Spa, Gym, WiFi, 
Bar & Restaurant', 23, 'https://www.khotels.ug', 'images/K_Hotels_entebbe.jpg'),
('Admas Grand Hotel', 4, 'Circular Road', 'Bay Views, Pool, 
Sauna, Gym', 28, 'https://admasgrandhotel.com', 'admas_grand_hotel.jpg'),
('Imperial Heights', 4, 'Church Road (Kitoro)', 'Spa, Gym, WiFi, 
Rooftop Terrace, Pool', 32, 'http://www.imperialhotels.co.ug', 'images/imperial_heights.jpg'),
('Executive Airport Hotel', 3, 'Kamuli Road (Kitoro)', 'Free WiFi, 
Garden, Shuttle, Restaurant', 22, 'https://www.booking.com', 'images/executive_airport_hotel.jpg'),
('Psalms Motel', 3, 'Fulu Road (Kitoro)', 'Bar, Restaurant, 
Executive Room Service, WiFi', 17, 'http://www.psalmsmotelentebbe.com', 'images/psalms_motel.jpg'),
('Golden Quest Hotel', 3, 'Hamu Mukasa Road', 'Pool, Spa, Pets Allowed, 
Bar & Restaurant', 24, 'http://goldenquesthotel.com', 'Golden_quest_hotel.jpg'),
('Skyway Hotel', 3, 'Mugula Road', 'Golf Access, Restaurant, WiFi, 
Shuttle, Local Music Performances', 21, 'https://www.skywayhotel.com', 'images/Skyway_Hotel.jpg'),
('Ambrosia Heights', 3, 'Kitoro Center', 'AC, Outdoor Bar, Garden,
 Ragae Nights', 19, 'https://www.expedia.com', 'images/Ambrosia_Heights.jpg'),
('Hotel Dot Com', 2, 'Kitoro Market Area', 'Budget Friendly, Restaurant, 
Room Service', 15, 'https://www.agoda.com', 'images/hotel_dot_com.jpg'),
('Lakeside Resort', 3, 'Kawuku Bugiri', 'Lake View, Quiet, Security, 
Garden', 20, 'https://responsibletourismcompany.com', 'images/lakeside_resort.jpg');
