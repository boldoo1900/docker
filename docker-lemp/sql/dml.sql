delete from user_hobby_map;
delete from hobby;
delete from comments;
delete from articles;
delete from blogs;
delete from users;

INSERT INTO `hobby` (`hobby_id`, `hobby`, `created_at`, `updated_at`) VALUES
(1, 'Programming', NULL, NULL),
(2, 'Reading', NULL, NULL),
(3, 'Swimming', NULL, NULL);

-- password: 12345678
INSERT INTO `users` (`user_id`, `email`, `nickname`, `password`, `birth_date`, `gender`) VALUES
(1, 'test@yahoo.com', 'testuser123', '25d55ad283aa400af464c76d713c07ad', '1970-01-15', 'M'),
(3, 'test1@yahoo.com', 'hello', '25d55ad283aa400af464c76d713c07ad', '2020-04-16', 'M'),
(4, 'test123@yahoo.com', '12345', '25d55ad283aa400af464c76d713c07ad', '2020-04-17', 'M');

INSERT INTO `user_hobby_map` (`user_hobby_map_id`, `user_id`, `hobby_id`) VALUES
(26, 3, 1),
(27, 4, 1),
(28, 4, 2),
(29, 1, 1),
(30, 1, 2),
(31, 1, 3);

INSERT INTO `blogs` (`blog_id`, `user_id`, `blog_name`, `sub_title`, `header_image`, `is_public`) VALUES
(1, 1, 'Basketball', 'basket ball news', '1587593246.jpg', 1),
(2, 1, 'Running', 'running tips', '1587593262.jpeg', 1),
(3, 1, 'Programming', 'various programming languages', '1587581454.png', 1),
(9, 4, 'test blog', 'sub title', '1587619322.jpg', 1);

INSERT INTO `articles` (`article_id`, `blog_id`, `title`, `body`, `is_public`, `created_at`, `updated_at`) VALUES
(1, 1, 'History', 'The history of basketball began with its invention in 1891 in Springfield, Massachusetts by Canadian physical education instructor James Naismith as a less injury-prone sport than football. Naismith was a 31-year old graduate student when he created the indoor sport to keep athletes indoors during the winters.[1] The game became established fairly quickly and grew very popular as the 20th century progressed, first in America and then in other parts of the world. After basketball became established in American colleges, the professional game followed. The American National Basketball Association (NBA), established in 1946, grew to a multibillion-dollar enterprise by the end of the century, and basketball became an integral part of American culture.\r\n\r\n', 0, '2020-04-06', '1970-01-01'),
(2, 1, 'Player association', 'The National Basketball Players Association (NBPA) is a labor union that represents National Basketball Association (NBA) players. It was founded in 1954, making it the oldest trade union of the four major North American professional sports leagues. However, the NBPA did not get recognition by NBA team owners until ten years later. Its offices are located in the historic Park and Tilford Building in New York City.[1] It was briefly a trade association after dissolving as a union during the 2011 NBA lockout.\r\n\r\n', 1, '2020-04-06', '1970-01-01'),
(4, 1, 'The high point in the Charlotte Hornets\' history', 'The Hornets came into existence in 1988 and quickly endeared themselves to a region that had long held a love affair with hoops. Armed with the hottest uniform in sports and savvy expansion drafting that landed sharpshooter Dell Curry and fan favorite Muggsy Bogues, the Hornets had no trouble filling up the 24,000-seat Charlotte Coliseum on a nightly basis. \r\n\r\n\r\nIt didn’t matter that they were bad in the early days. They were supposed to be. This was an expansion team. And three straight seasons of failing to win more than 26 games paid off in lottery riches. \r\n\r\nThe Hornets hit the jackpot in 1991, landing the No. 1 pick in the draft and the grand prize that was UNLV superstar Larry Johnson, an explosive power forward with the grace of a shooting guard and the build of a linebacker. Think Zion Williamson for the early ’90s set. ', 1, '1970-01-01', '1970-01-01'),
(5, 2, 'Hydrate (Especially Before Trail Races)', 'Due to their remote locations, many trail races have few (if any) water stations. Make sure to hydrate for days in advance, and—depending on the distance of the race—consider carrying a water bottle or hydration pack during the event.”', 1, '1970-01-01', '1970-01-01'),
(6, 1, 'title', 'jflaksdjflkasjdlf\r\nfajlsdkfjalksdfja\r\nfajsdklfjkalsdf', 1, '2020-04-23', '2020-04-23'),
(7, 1, 'title', 'fjaldfjalksdfjklasdjfkl', 1, '2020-04-23', '2020-04-23'),
(8, 1, 'title', 'title', 1, '2020-04-23', '2020-04-23'),
(9, 9, 'dfasdfasdfas', 'fasdfasdfasdf', 1, '2020-04-23', '2020-04-23'),
(10, 9, 'fasdfasdf', 'adfasdfads', 0, '2020-04-23', '2020-04-23');


INSERT INTO `comments` (`comment_id`, `article_id`, `posted_user_id`, `comment`, `created_at`) VALUES
(2, 2, 1, 'sasdfasdfasdf', '2020-04-23 00:00:00'),
(3, 2, 1, 'test', '2020-04-23 00:00:00'),
(4, 2, 1, 'test', '2020-04-23 00:00:00'),
(5, 2, 1, 'test', '2020-04-23 00:00:00'),
(6, 2, 1, 'test', '2020-04-23 00:00:00'),
(7, 2, 1, 'test', '2020-04-23 00:00:00'),
(8, 2, 1, 'fasdfasdfa fasdfasdfafasdfasdfafasdfasdfa. fasdfasdfa fasdfasdfafasdfasdfafasdfasdfafasdfasdfa fasdfasdfafasdfasdfafasdfasdfa fasdfasdfa fasdfasdfafasdfasdfafasdfasdfa', '2020-04-23 00:00:00'),
(9, 2, 1, 'helloworldfjaklsdjflka', '2020-04-23 00:00:00'),
(10, 2, 1, 'fadkfjakldfjladf\nfajdsklfjaldjflad', '2020-04-23 01:19:00'),
(11, 2, 1, 'fadkfjakldfjladf\nfajdsklfjaldjflad', '2020-04-23 01:19:00'),
(12, 2, 1, 'test user', '2020-04-23 01:20:00'),
(13, 2, 1, 'helloworld', '2020-04-23 01:20:00'),
(14, 4, 3, 'test123', '2020-04-23 01:56:00'),
(15, 2, 3, 'basketball basketball basketball basketball basketball basketball basketball basketball basketball ', '2020-04-23 01:57:00'),
(16, 2, 4, 'adfasdfadsfadsf', '2020-04-23 05:21:00'),
(17, 2, 1, 'asdfasfasd', '2020-04-23 05:23:00'),
(18, 9, 4, 'test fsdfasdfasdfas df test fsdfasdfasdfas dftest fsdfasdfasdfas df', '2020-04-23 05:41:00'),
(19, 9, 4, '<script type=\"txt/javascript\">alert(\"sdfadf\");</script>', '2020-04-23 05:44:00');


