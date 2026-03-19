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
('Best Western Premier', 4, 'Manyago (Near Victoria Mall)',
 'Pool, Gym, Spa, WiFi', 25, 'https://www.bestwestern.com', 'BWP_Hotel.jpg'),
('K Hotels Entebbe', 4, 'Hill Road', 'Rooftop Lounge, Spa, Gym, WiFi, 
Bar & Restaurant', 23, 'https://www.khotels.ug', 'K_Hotels.jpg'),
('Admas Grand Hotel', 4, 'Circular Road', 'Bay Views, Pool, 
Sauna, Gym', 28, 'https://admasgrandhotel.com', 'AdmasGrand_Hotel.jpg'),
('Imperial Heights', 4, 'Church Road (Kitoro)', 'Spa, Gym, WiFi, 
Rooftop Terrace, Pool', 32, 'http://www.imperialhotels.co.ug', 'ImperialHeights.jpg'),
('Executive Airport Hotel', 3, 'Kamuli Road (Kitoro)', 'Free WiFi, 
Garden, Shuttle, Restaurant', 22, 'https://www.booking.com', 'Executive_Airport.jpg'),
('Psalms Motel', 3, 'Fulu Road (Kitoro)', 'Bar, Restaurant, 
Executive Room Service, WiFi', 17, 'http://www.psalmsmotelentebbe.com', 'PsalmsMotel.jpg'),
('Golden Quest Hotel', 3, 'Hamu Mukasa Road', 'Pool, Spa, Pets Allowed, 
Bar & Restaurant', 24, 'http://goldenquesthotel.com', 'GoldenQuest.jpg'),
('Skyway Hotel', 3, 'Mugula Road', 'Golf Access, Restaurant, WiFi, 
Shuttle, Local Music Performances', 21, 'https://www.skywayhotel.com', 'Skyway_Hotel.jpg'),
('Ambrosia Heights', 3, 'Kitoro Center', 'AC, Outdoor Bar, Garden,
 Ragae Nights', 19, 'https://www.expedia.com', 'AmbrosiaHeights.jpg'),
('Hotel Dot Com', 2, 'Kitoro Market Area', 'Budget Friendly, Restaurant, 
Room Service', 15, 'https://www.agoda.com', 'HotelDotCom.jpg'),
('Lakeside Resort', 3, 'Kawuku Bugiri', 'Lake View, Quiet, Security, 
Garden', 20, 'https://responsibletourismcompany.com', 'LakesideResort.jpg');
