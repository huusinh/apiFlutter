
INSERT INTO `loai_san_phams` (`id`, `ten_loai_san_pham`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'apple \r\n', NULL, NULL, NULL),
(2, 'samsung', NULL, NULL, NULL),
(3, 'xiaomi', NULL, NULL, NULL),
(4, 'other', NULL, NULL, NULL);


INSERT INTO `san_phams` (`id`, `image`, `tittle`, `description`, `price`, `size`, `loai_san_pham_id`, `created_at`, `updated_at`, `deleted_at`, `color`) VALUES
(1, 'product-1.png', 'Apple watch series3', 'dep ', 234, 12, 1, NULL, NULL, NULL, 'mau hong sen'),
(2, 'product-2.png', 'Apple watch series4', 'dep ', 234, 12, 1, NULL, NULL, NULL, 'mau hong tim'),
(3, 'product-3.png', 'Apple watch series5', 'dep ', 234, 12, 1, NULL, NULL, NULL, 'mau hong cam'),
(4, 'product-4.png', 'Apple watch series6', 'dep ', 234, 12, 1, NULL, NULL, NULL, 'mau hong dao'),
(5, 'product-5.png', 'Apple watch series7', 'dep ', 234, 12, 1, NULL, NULL, NULL, 'mau hong lua'),
(6, 'product-6.png', 'Apple Watch Series7 GPS ', 'dep', 234, 12, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'màu xanh đen'),
(7, 'samsung-1.png', 'Galaxy Watch4 Bluetooth', 'dep', 234, 0, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'hồng'),
(8, 'samsung-2.png', 'Galaxy Watch4 LTE', 'dep', 234, 0, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'đen'),
(9, 'samsung-3.png', 'Galaxy Watch4 Bluetooth', 'dep', 234, 0, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'xanh đen'),
(10, 'samsung-4.png', 'Galaxy Watch4 Classic Bluetooth', 'dep', 234, 0, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'trắng'),
(11, 'samsung-5.png', 'Galaxy Watch4 Classic LTE', 'dep', 234, 0, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'đen'),
(12, 'xiaomi-1.png\r\n', 'Mi Band6 ', 'dep', 234, 12, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'black'),
(13, 'xiaomi-2.png', 'Xiaomi Haylou LS02', 'dep', 234, 12, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'black'),
(14, 'xiaomi-3.png\r\n', 'Mi Band5 ', 'dep', 234, 12, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'black'),
(15, 'xiaomi-4.png', 'Xiaomi Haylou Solar ', 'dep', 234, 12, 3, '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'black');

INSERT INTO `users` (`name`, `email`, `diachi`, `sodienthoai`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
('quanmatcac', 'quanmatcac11@gmail.com', 'bien hoa đòng nai', '0123456789', NULL, 'quanmatcac', NULL, NULL, NULL);

INSERT INTO `gio_hangs` (`id`, `iduser`) VALUES
(1, 1);

INSERT INTO `chi_tiet_gio_hangs` (`id`, `idgiohang`, `idsanpham`, `soluong`, `updated_at`) VALUES
(1, 1, 15, 1, NULL),
(2, 1, 2, 1, NULL);

INSERT INTO `hoa_dons` (`id`, `ngaylap`, `diachi`, `sodienthoai`, `ghichu`, `tongtien`, `idtaikhoan`,`TrangThai`) VALUES
(20220209102514, '2022-02-09', 'bienhoa', '0123456789', 'hehe', 20000, 1,1),
(20220209102828, '2022-02-09', 'bienhoa', '0123456789', 'hehe', 20000, 1,1);



INSERT INTO `chi_tiet_hoa_dons` (`id`, `soluong`, `dongia`, `idsanpham`, `idhoadon`) VALUES
(2, 10, 20000, 1, 20220209102828);
