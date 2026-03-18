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

INSERT INTO hotels (name, rating, location, services, available_space, website, image) VALUES
('Best Western Premier', 4, 'Manyago (Near Victoria Mall)', 'Pool, Gym, Spa, WiFi', 5, 'https://www.bestwestern.com', 'hotel1.jpg'),
('K Hotels Entebbe', 4, 'Hill Road', 'Rooftop Lounge, Spa, Gym', 3, 'https://www.khotels.ug', 'hotel2.jpg'),
('Admas Grand Hotel', 4, 'Circular Road', 'Bay Views, Pool, Sauna', 8, 'https://admasgrandhotel.com', 'hotel3.jpg'),
('Imperial Heights', 4, 'Church Road (Kitoro)', 'Spa, Rooftop Terrace, Pool', 2, 'http://www.imperialhotels.co.ug', 'hotel4.jpg'),
('Executive Airport Hotel', 3, 'Kamuli Road (Kitoro)', 'Free WiFi, Garden, Shuttle', 12, 'https://www.booking.com', 'hotel5.jpg'),
('Psalms Motel', 3, 'Fulu Road (Kitoro)', 'Bar, Restaurant, Room Service', 7, 'http://www.psalmsmotelentebbe.com', 'hotel6.jpg'),
('Golden Quest Hotel', 3, 'Hamu Mukasa Road', 'Pool, Spa, Pets Allowed', 4, 'http://goldenquesthotel.com', 'hotel7.jpg'),
('Skyway Hotel', 3, 'Mugula Road', 'Golf Access, Restaurant', 6, 'https://www.skywayhotel.com', 'hotel8.jpg'),
('Ambrosia Heights', 3, 'Kitoro Center', 'AC, Outdoor Bar, Garden', 9, 'https://www.expedia.com', 'hotel9.jpg'),
('Hotel Dot Com', 2, 'Kitoro Market Area', 'Budget Friendly, Restaurant', 15, 'https://www.agoda.com', 'hotel10.jpg'),
('Lakeside Resort', 3, 'Kawuku Bugiri', 'Lake View, Quiet, Security', 10, 'https://responsibletourismcompany.com', 'hotel11.jpg');
