
INSERT INTO `users` (`user_id`, `email`, `nickname`, `password`, `birth_date`, `gender`) VALUES
(1, 'test@yahoo.com', 'testuser', '25d55ad283aa400af464c76d713c07ad', '1970-01-01', 'M');

INSERT INTO `hobby` (`hobby_id`, `hobby`) VALUES
(1, 'Programming'), (2, 'Reading'), (3, 'Swimming');


INSERT INTO `blogs` (`blog_id`, `user_id`, `blog_name`, `sub_title`, `header_image`, `is_public`) VALUES
(1, 1, 'hellow woasjdlf', 'jfklasjdflkasd', '', 0),
(2, 1, '12312312', '312312312', '', 1),
(3, 1, 'fadsfasdfasdf', 'fasdfasdfasdfads', '', 1);


INSERT INTO `articles` (`article_id`, `blog_id`, `title`, `body`, `is_public`, `created_at`, `updated_at`) VALUES
(1, 1, 'dddfasdfasdfa dddfasdfasdfa dddfasdfasdfa', 'dddfasdfasdfa dddfasdfasdfa dddfasdfasdfadddfasdfasdfa dddfasdfasdfa dddfasdfasdfadddfasdfasdfa dddfasdfasdfa dddfasdfasdfadddfasdfasdfa dddfasdfasdfa dddfasdfasdfadddfasdfasdfa dddfasdfasdfa dddfasdfasdfadddfasdfasdfa dddfasdfasdfa dddfasdfasdfadddfasdfasdfa dddfasdfasdfa dddfasdfasdfadddfasdfasdfa dddfasdfasdfa dddfasdfasdfa\r\n\r\n\r\ndddfasdfasdfa dddfasdfasdfa dddfasdfasdfa', 0, '2020-04-06', '2020-04-08'),
(2, 1, 'dddfasdfasdfa dddfasdfasdfa dddfasdfasdfa', 'dddfasdfasdfa dddfasdfasdfa dddfasdfasdfadddfasdfasdfa dddfasdfasdfa dddfasdfasdfadddfasdfasdfa dddfasdfasdfa dddfasdfasdfadddfasdfasdfa dddfasdfasdfa dddfasdfasdfadddfasdfasdfa dddfasdfasdfa dddfasdfasdfadddfasdfasdfa dddfasdfasdfa dddfasdfasdfadddfasdfasdfa dddfasdfasdfa dddfasdfasdfadddfasdfasdfa dddfasdfasdfa dddfasdfasdfa\r\n\r\n\r\ndddfasdfasdfa dddfasdfasdfa dddfasdfasdfa', 0, '2020-04-06', '2020-04-08');
