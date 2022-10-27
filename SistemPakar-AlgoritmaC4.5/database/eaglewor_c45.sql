-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 14 Jul 2022 pada 00.00
-- Versi server: 10.3.35-MariaDB
-- Versi PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eaglewor_c45`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_atribut`
--

CREATE TABLE `tb_atribut` (
  `id_atribut` varchar(16) NOT NULL,
  `nama_atribut` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_atribut`
--

INSERT INTO `tb_atribut` (`id_atribut`, `nama_atribut`, `gambar`) VALUES
('A23', 'Bluetooth tidak terdeteksi', '15498410blutooth.jpg'),
('A22', 'Bluetooth tidak dapat menyala', '75883431blutooth.jpg'),
('A21', 'Mengalami booting hanya sampai logo', '5024small_2057bootloop.jpg'),
('A20', 'Anda lupa pola/sandi', '7891small_8576lupapolasandi.jpg'),
('A19', 'Speaker tidak dapat mengeluarkan suara', '65722871speaker.png'),
('A18', 'Smartphohe mati total', '80416643matot.jpg'),
('A17', 'Mengalami aplikasi restart', '3867small_2057bootloop.jpg'),
('A15', 'Smartphone mengalami hang', '3178small_5030screenshot-(695).png'),
('A16', 'Mengalami aplikasi error', '4648small_9818aplikasi.jpg'),
('A14', 'Tidak dapat menangkap sinyal', '43797632screenshot-(693).png'),
('A13', 'Tidak dapat di charge', '34664548screenshot-(691).png'),
('A12', 'Smartphone kemasukan air', '31241507kenaair.jpg'),
('A11', 'Tidak dapat bergetar', '6427small_9582vibrator.jpg'),
('A10', 'Hasil suara tidak jernih', '20749407speaker.png'),
('A08', 'Hasil kamera buram', '41256013kamera.jpg'),
('A09', 'Mic tidak dapat menangkap suara', '86022230microphone.png'),
('A06', 'Touchscreen tidak akurat', '36673947lcd.jpg'),
('A07', 'Tidak dapat membuka kamera', '13636013kamera.jpg'),
('A04', 'LCD mati', '36143947lcd.jpg'),
('A05', 'Terdapat garis pada layar', '5032garis.jpg'),
('A02', 'Baterai Boros', '8030baterai-boros.jpg'),
('A03', 'Baterai lama terisi', '2157baterai-lama-terisi.jpg'),
('A01', 'Smartphone panas', '9429smartphone-panas.jpg'),
('A24', 'Data sering nge-reset', '98241364memory.png'),
('A25', 'Mengalami inject nomor gagal', '2469small_5259simkonektor.jpg'),
('A26', 'SIM tidak terdeteksi', '9491small_5259simkonektor.jpg'),
('A27', 'Tombol power rusak', '6923small_2784tombolpower.jpg'),
('A28', 'Kerusakan', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_dataset`
--

CREATE TABLE `tb_dataset` (
  `id_dataset` int(11) NOT NULL,
  `nomor` int(11) NOT NULL,
  `id_atribut` varchar(16) NOT NULL,
  `id_nilai` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_dataset`
--

INSERT INTO `tb_dataset` (`id_dataset`, `nomor`, `id_atribut`, `id_nilai`) VALUES
(515, 8, 'A04', 72),
(514, 8, 'A03', 68),
(506, 7, 'A23', 111),
(498, 7, 'A15', 94),
(490, 7, 'A07', 78),
(482, 6, 'A27', 119),
(474, 6, 'A19', 103),
(466, 6, 'A11', 86),
(458, 6, 'A03', 68),
(450, 5, 'A23', 111),
(442, 5, 'A15', 94),
(434, 5, 'A07', 78),
(426, 4, 'A27', 119),
(425, 4, 'A26', 117),
(424, 4, 'A25', 115),
(423, 4, 'A24', 113),
(422, 4, 'A23', 111),
(421, 4, 'A22', 109),
(420, 4, 'A21', 106),
(419, 4, 'A20', 105),
(418, 4, 'A19', 103),
(417, 4, 'A18', 100),
(416, 4, 'A17', 98),
(415, 4, 'A16', 96),
(414, 4, 'A15', 94),
(413, 4, 'A14', 91),
(412, 4, 'A13', 90),
(513, 8, 'A02', 67),
(505, 7, 'A22', 109),
(497, 7, 'A14', 92),
(489, 7, 'A06', 76),
(481, 6, 'A26', 117),
(473, 6, 'A18', 99),
(465, 6, 'A10', 84),
(457, 6, 'A02', 67),
(449, 5, 'A22', 109),
(441, 5, 'A14', 91),
(433, 5, 'A06', 76),
(411, 4, 'A12', 88),
(410, 4, 'A11', 86),
(409, 4, 'A10', 83),
(408, 4, 'A09', 81),
(407, 4, 'A08', 80),
(406, 4, 'A07', 78),
(405, 4, 'A06', 76),
(404, 4, 'A05', 74),
(403, 4, 'A04', 72),
(402, 4, 'A03', 68),
(401, 4, 'A02', 67),
(400, 4, 'A01', 65),
(399, 3, 'A28', 122),
(398, 3, 'A27', 119),
(397, 3, 'A26', 117),
(512, 8, 'A01', 65),
(504, 7, 'A21', 106),
(496, 7, 'A13', 90),
(488, 7, 'A05', 74),
(480, 6, 'A25', 115),
(472, 6, 'A17', 98),
(464, 6, 'A09', 82),
(456, 6, 'A01', 65),
(448, 5, 'A21', 106),
(440, 5, 'A13', 90),
(432, 5, 'A05', 74),
(396, 3, 'A25', 115),
(395, 3, 'A24', 113),
(394, 3, 'A23', 111),
(393, 3, 'A22', 109),
(392, 3, 'A21', 106),
(391, 3, 'A20', 105),
(390, 3, 'A19', 103),
(389, 3, 'A18', 100),
(388, 3, 'A17', 98),
(387, 3, 'A16', 96),
(386, 3, 'A15', 94),
(385, 3, 'A14', 91),
(384, 3, 'A13', 90),
(383, 3, 'A12', 88),
(382, 3, 'A11', 86),
(511, 7, 'A28', 126),
(503, 7, 'A20', 105),
(495, 7, 'A12', 88),
(487, 7, 'A04', 72),
(479, 6, 'A24', 113),
(471, 6, 'A16', 96),
(463, 6, 'A08', 80),
(455, 5, 'A28', 124),
(447, 5, 'A20', 105),
(439, 5, 'A12', 88),
(431, 5, 'A04', 72),
(381, 3, 'A10', 84),
(380, 3, 'A09', 82),
(379, 3, 'A08', 79),
(378, 3, 'A07', 77),
(377, 3, 'A06', 76),
(376, 3, 'A05', 74),
(375, 3, 'A04', 72),
(374, 3, 'A03', 68),
(373, 3, 'A02', 67),
(372, 3, 'A01', 65),
(371, 2, 'A28', 121),
(370, 2, 'A27', 119),
(369, 2, 'A26', 117),
(368, 2, 'A25', 115),
(367, 2, 'A24', 113),
(510, 7, 'A27', 119),
(502, 7, 'A19', 103),
(494, 7, 'A11', 86),
(486, 7, 'A03', 68),
(478, 6, 'A23', 111),
(470, 6, 'A15', 93),
(462, 6, 'A07', 78),
(454, 5, 'A27', 119),
(446, 5, 'A19', 103),
(438, 5, 'A11', 85),
(430, 5, 'A03', 68),
(366, 2, 'A23', 111),
(365, 2, 'A22', 109),
(364, 2, 'A21', 106),
(363, 2, 'A20', 105),
(362, 2, 'A19', 103),
(361, 2, 'A18', 100),
(360, 2, 'A17', 98),
(359, 2, 'A16', 96),
(358, 2, 'A15', 94),
(357, 2, 'A14', 91),
(356, 2, 'A13', 90),
(355, 2, 'A12', 88),
(354, 2, 'A11', 86),
(353, 2, 'A10', 84),
(352, 2, 'A09', 82),
(509, 7, 'A26', 117),
(501, 7, 'A18', 100),
(493, 7, 'A10', 84),
(485, 7, 'A02', 67),
(477, 6, 'A22', 109),
(469, 6, 'A14', 91),
(461, 6, 'A06', 76),
(453, 5, 'A26', 117),
(445, 5, 'A18', 100),
(437, 5, 'A10', 84),
(429, 5, 'A02', 67),
(351, 2, 'A08', 80),
(350, 2, 'A07', 78),
(349, 2, 'A06', 75),
(348, 2, 'A05', 73),
(347, 2, 'A04', 71),
(346, 2, 'A03', 68),
(345, 2, 'A02', 67),
(344, 2, 'A01', 65),
(343, 1, 'A28', 120),
(342, 1, 'A27', 119),
(341, 1, 'A26', 117),
(340, 1, 'A25', 115),
(339, 1, 'A24', 113),
(338, 1, 'A23', 111),
(337, 1, 'A22', 109),
(508, 7, 'A25', 115),
(500, 7, 'A17', 98),
(492, 7, 'A09', 82),
(484, 7, 'A01', 64),
(476, 6, 'A21', 106),
(468, 6, 'A13', 90),
(460, 6, 'A05', 74),
(452, 5, 'A25', 115),
(444, 5, 'A17', 98),
(436, 5, 'A09', 82),
(428, 5, 'A01', 65),
(336, 1, 'A21', 106),
(335, 1, 'A20', 105),
(334, 1, 'A19', 103),
(333, 1, 'A18', 100),
(332, 1, 'A17', 98),
(331, 1, 'A16', 96),
(330, 1, 'A15', 94),
(329, 1, 'A14', 91),
(328, 1, 'A13', 90),
(327, 1, 'A12', 88),
(326, 1, 'A11', 86),
(325, 1, 'A10', 84),
(324, 1, 'A09', 82),
(323, 1, 'A08', 80),
(322, 1, 'A07', 78),
(507, 7, 'A24', 113),
(499, 7, 'A16', 96),
(491, 7, 'A08', 80),
(483, 6, 'A28', 125),
(475, 6, 'A20', 105),
(467, 6, 'A12', 87),
(459, 6, 'A04', 71),
(451, 5, 'A24', 113),
(443, 5, 'A16', 96),
(435, 5, 'A08', 80),
(427, 4, 'A28', 123),
(321, 1, 'A06', 76),
(320, 1, 'A05', 74),
(319, 1, 'A04', 72),
(318, 1, 'A03', 70),
(317, 1, 'A02', 66),
(316, 1, 'A01', 64),
(516, 8, 'A05', 74),
(517, 8, 'A06', 76),
(518, 8, 'A07', 77),
(519, 8, 'A08', 80),
(520, 8, 'A09', 82),
(521, 8, 'A10', 84),
(522, 8, 'A11', 86),
(523, 8, 'A12', 88),
(524, 8, 'A13', 90),
(525, 8, 'A14', 91),
(526, 8, 'A15', 93),
(527, 8, 'A16', 95),
(528, 8, 'A17', 97),
(529, 8, 'A18', 100),
(530, 8, 'A19', 103),
(531, 8, 'A20', 105),
(532, 8, 'A21', 106),
(533, 8, 'A22', 109),
(534, 8, 'A23', 111),
(535, 8, 'A24', 113),
(536, 8, 'A25', 115),
(537, 8, 'A26', 117),
(538, 8, 'A27', 119),
(539, 8, 'A28', 127),
(540, 9, 'A01', 65),
(541, 9, 'A02', 67),
(542, 9, 'A03', 68),
(543, 9, 'A04', 72),
(544, 9, 'A05', 74),
(545, 9, 'A06', 76),
(546, 9, 'A07', 78),
(547, 9, 'A08', 80),
(548, 9, 'A09', 82),
(549, 9, 'A10', 84),
(550, 9, 'A11', 86),
(551, 9, 'A12', 88),
(552, 9, 'A13', 89),
(553, 9, 'A14', 91),
(554, 9, 'A15', 94),
(555, 9, 'A16', 96),
(556, 9, 'A17', 98),
(557, 9, 'A18', 99),
(558, 9, 'A19', 103),
(559, 9, 'A20', 105),
(560, 9, 'A21', 106),
(561, 9, 'A22', 109),
(562, 9, 'A23', 111),
(563, 9, 'A24', 113),
(564, 9, 'A25', 115),
(565, 9, 'A26', 116),
(566, 9, 'A27', 119),
(567, 9, 'A28', 137),
(568, 10, 'A01', 65),
(569, 10, 'A02', 67),
(570, 10, 'A03', 68),
(571, 10, 'A04', 72),
(572, 10, 'A05', 74),
(573, 10, 'A06', 76),
(574, 10, 'A07', 78),
(575, 10, 'A08', 80),
(576, 10, 'A09', 82),
(577, 10, 'A10', 84),
(578, 10, 'A11', 86),
(579, 10, 'A12', 88),
(580, 10, 'A13', 90),
(581, 10, 'A14', 91),
(582, 10, 'A15', 94),
(583, 10, 'A16', 96),
(584, 10, 'A17', 98),
(585, 10, 'A18', 100),
(586, 10, 'A19', 101),
(587, 10, 'A20', 105),
(588, 10, 'A21', 106),
(589, 10, 'A22', 109),
(590, 10, 'A23', 111),
(591, 10, 'A24', 113),
(592, 10, 'A25', 115),
(593, 10, 'A26', 117),
(594, 10, 'A27', 119),
(595, 10, 'A28', 128),
(596, 11, 'A01', 65),
(597, 11, 'A02', 67),
(598, 11, 'A03', 68),
(599, 11, 'A04', 72),
(600, 11, 'A05', 74),
(601, 11, 'A06', 76),
(602, 11, 'A07', 78),
(603, 11, 'A08', 80),
(604, 11, 'A09', 82),
(605, 11, 'A10', 84),
(606, 11, 'A11', 86),
(607, 11, 'A12', 88),
(608, 11, 'A13', 90),
(609, 11, 'A14', 91),
(610, 11, 'A15', 94),
(611, 11, 'A16', 96),
(612, 11, 'A17', 98),
(613, 11, 'A18', 100),
(614, 11, 'A19', 103),
(615, 11, 'A20', 104),
(616, 11, 'A21', 106),
(617, 11, 'A22', 109),
(618, 11, 'A23', 111),
(619, 11, 'A24', 113),
(620, 11, 'A25', 115),
(621, 11, 'A26', 117),
(622, 11, 'A27', 119),
(623, 11, 'A28', 129),
(624, 12, 'A01', 65),
(625, 12, 'A02', 67),
(626, 12, 'A03', 68),
(627, 12, 'A04', 72),
(628, 12, 'A05', 74),
(629, 12, 'A06', 76),
(630, 12, 'A07', 78),
(631, 12, 'A08', 80),
(632, 12, 'A09', 82),
(633, 12, 'A10', 84),
(634, 12, 'A11', 86),
(635, 12, 'A12', 88),
(636, 12, 'A13', 90),
(637, 12, 'A14', 91),
(638, 12, 'A15', 94),
(639, 12, 'A16', 96),
(640, 12, 'A17', 98),
(641, 12, 'A18', 100),
(642, 12, 'A19', 103),
(643, 12, 'A20', 105),
(644, 12, 'A21', 107),
(645, 12, 'A22', 109),
(646, 12, 'A23', 111),
(647, 12, 'A24', 113),
(648, 12, 'A25', 115),
(649, 12, 'A26', 117),
(650, 12, 'A27', 119),
(651, 12, 'A28', 130),
(652, 13, 'A01', 64),
(653, 13, 'A02', 66),
(654, 13, 'A03', 68),
(655, 13, 'A04', 72),
(656, 13, 'A05', 74),
(657, 13, 'A06', 76),
(658, 13, 'A07', 78),
(659, 13, 'A08', 80),
(660, 13, 'A09', 82),
(661, 13, 'A10', 84),
(662, 13, 'A11', 86),
(663, 13, 'A12', 88),
(664, 13, 'A13', 90),
(665, 13, 'A14', 91),
(666, 13, 'A15', 93),
(667, 13, 'A16', 96),
(668, 13, 'A17', 98),
(669, 13, 'A18', 100),
(670, 13, 'A19', 103),
(671, 13, 'A20', 105),
(672, 13, 'A21', 106),
(673, 13, 'A22', 109),
(674, 13, 'A23', 111),
(675, 13, 'A24', 113),
(676, 13, 'A25', 115),
(677, 13, 'A26', 117),
(678, 13, 'A27', 119),
(679, 13, 'A28', 131),
(680, 14, 'A01', 65),
(681, 14, 'A02', 67),
(682, 14, 'A03', 68),
(683, 14, 'A04', 72),
(684, 14, 'A05', 74),
(685, 14, 'A06', 76),
(686, 14, 'A07', 78),
(687, 14, 'A08', 80),
(688, 14, 'A09', 82),
(689, 14, 'A10', 84),
(690, 14, 'A11', 86),
(691, 14, 'A12', 88),
(692, 14, 'A13', 90),
(693, 14, 'A14', 91),
(694, 14, 'A15', 94),
(695, 14, 'A16', 96),
(696, 14, 'A17', 98),
(697, 14, 'A18', 100),
(698, 14, 'A19', 103),
(699, 14, 'A20', 105),
(700, 14, 'A21', 106),
(701, 14, 'A22', 108),
(702, 14, 'A23', 110),
(703, 14, 'A24', 113),
(704, 14, 'A25', 115),
(705, 14, 'A26', 117),
(706, 14, 'A27', 119),
(707, 14, 'A28', 132),
(708, 15, 'A01', 65),
(709, 15, 'A02', 67),
(710, 15, 'A03', 68),
(711, 15, 'A04', 72),
(712, 15, 'A05', 74),
(713, 15, 'A06', 76),
(714, 15, 'A07', 78),
(715, 15, 'A08', 80),
(716, 15, 'A09', 82),
(717, 15, 'A10', 84),
(718, 15, 'A11', 86),
(719, 15, 'A12', 88),
(720, 15, 'A13', 90),
(721, 15, 'A14', 91),
(722, 15, 'A15', 94),
(723, 15, 'A16', 96),
(724, 15, 'A17', 97),
(725, 15, 'A18', 100),
(726, 15, 'A19', 103),
(727, 15, 'A20', 105),
(728, 15, 'A21', 106),
(729, 15, 'A22', 109),
(730, 15, 'A23', 111),
(731, 15, 'A24', 112),
(732, 15, 'A25', 114),
(733, 15, 'A26', 117),
(734, 15, 'A27', 119),
(735, 15, 'A28', 133),
(736, 16, 'A01', 65),
(737, 16, 'A02', 67),
(738, 16, 'A03', 68),
(739, 16, 'A04', 72),
(740, 16, 'A05', 74),
(741, 16, 'A06', 76),
(742, 16, 'A07', 78),
(743, 16, 'A08', 80),
(744, 16, 'A09', 82),
(745, 16, 'A10', 84),
(746, 16, 'A11', 86),
(747, 16, 'A12', 88),
(748, 16, 'A13', 90),
(749, 16, 'A14', 92),
(750, 16, 'A15', 94),
(751, 16, 'A16', 96),
(752, 16, 'A17', 98),
(753, 16, 'A18', 100),
(754, 16, 'A19', 103),
(755, 16, 'A20', 105),
(756, 16, 'A21', 106),
(757, 16, 'A22', 109),
(758, 16, 'A23', 111),
(759, 16, 'A24', 113),
(760, 16, 'A25', 114),
(761, 16, 'A26', 116),
(762, 16, 'A27', 119),
(763, 16, 'A28', 134),
(764, 17, 'A01', 65),
(765, 17, 'A02', 67),
(766, 17, 'A03', 68),
(767, 17, 'A04', 72),
(768, 17, 'A05', 74),
(769, 17, 'A06', 76),
(770, 17, 'A07', 78),
(771, 17, 'A08', 80),
(772, 17, 'A09', 82),
(773, 17, 'A10', 84),
(774, 17, 'A11', 86),
(775, 17, 'A12', 88),
(776, 17, 'A13', 90),
(777, 17, 'A14', 91),
(778, 17, 'A15', 94),
(779, 17, 'A16', 96),
(780, 17, 'A17', 98),
(781, 17, 'A18', 100),
(782, 17, 'A19', 103),
(783, 17, 'A20', 105),
(784, 17, 'A21', 106),
(785, 17, 'A22', 109),
(786, 17, 'A23', 111),
(787, 17, 'A24', 113),
(788, 17, 'A25', 115),
(789, 17, 'A26', 117),
(790, 17, 'A27', 118),
(791, 17, 'A28', 135),
(792, 18, 'A01', 65),
(793, 18, 'A02', 66),
(794, 18, 'A03', 68),
(795, 18, 'A04', 72),
(796, 18, 'A05', 74),
(797, 18, 'A06', 76),
(798, 18, 'A07', 78),
(799, 18, 'A08', 80),
(800, 18, 'A09', 82),
(801, 18, 'A10', 84),
(802, 18, 'A11', 86),
(803, 18, 'A12', 88),
(804, 18, 'A13', 90),
(805, 18, 'A14', 91),
(806, 18, 'A15', 93),
(807, 18, 'A16', 96),
(808, 18, 'A17', 98),
(809, 18, 'A18', 100),
(810, 18, 'A19', 103),
(811, 18, 'A20', 105),
(812, 18, 'A21', 106),
(813, 18, 'A22', 109),
(814, 18, 'A23', 111),
(815, 18, 'A24', 113),
(816, 18, 'A25', 115),
(817, 18, 'A26', 116),
(818, 18, 'A27', 119),
(819, 18, 'A28', 136),
(892, 19, 'A01', 65),
(893, 19, 'A02', 67),
(894, 19, 'A03', 68),
(895, 19, 'A04', 72),
(896, 19, 'A05', 74),
(897, 19, 'A06', 76),
(898, 19, 'A07', 78),
(899, 19, 'A08', 80),
(900, 19, 'A09', 82),
(901, 19, 'A10', 84),
(902, 19, 'A11', 86),
(903, 19, 'A12', 88),
(904, 19, 'A13', 90),
(905, 19, 'A14', 91),
(906, 19, 'A15', 94),
(907, 19, 'A16', 96),
(908, 19, 'A17', 98),
(909, 19, 'A18', 100),
(910, 19, 'A19', 103),
(911, 19, 'A20', 105),
(912, 19, 'A21', 106),
(913, 19, 'A22', 109),
(914, 19, 'A23', 111),
(915, 19, 'A24', 113),
(916, 19, 'A25', 115),
(917, 19, 'A26', 117),
(918, 19, 'A27', 119),
(919, 19, 'A28', 142);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_histori`
--

CREATE TABLE `tb_histori` (
  `id_histori` int(11) NOT NULL,
  `waktu` datetime DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_nilai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_histori`
--

INSERT INTO `tb_histori` (`id_histori`, `waktu`, `id_user`, `id_nilai`) VALUES
(1, '2022-05-22 15:18:31', 4, 35),
(2, '2022-05-23 19:40:40', 1, 39),
(3, '2022-05-23 19:44:36', 1, 42),
(4, '2022-05-23 19:46:44', 1, 39),
(5, '2022-05-23 19:57:31', 5, 42),
(6, '2022-05-23 20:01:13', 1, 39),
(7, '2022-05-23 20:11:21', 1, 0),
(8, '2022-06-08 16:40:10', 1, 135),
(9, '2022-06-09 08:22:37', 1, 133),
(10, '2022-06-14 13:31:47', 1, 135),
(11, '2022-06-14 13:31:51', 1, 120),
(12, '2022-06-14 13:35:50', 1, 120),
(13, '2022-06-14 13:36:31', 1, 120),
(14, '2022-06-14 13:36:46', 1, 120),
(15, '2022-06-14 13:36:47', 1, 120),
(16, '2022-06-14 13:37:10', 1, 120),
(17, '2022-06-14 13:37:24', 1, 120),
(18, '2022-06-14 13:37:39', 1, 120),
(19, '2022-06-14 13:37:48', 1, 120),
(20, '2022-06-14 13:38:15', 1, 120),
(21, '2022-06-15 10:18:24', 1, 120),
(22, '2022-06-15 19:59:05', 1, 120),
(23, '2022-06-15 20:02:40', 1, 120),
(24, '2022-06-15 20:27:53', 6, 120),
(25, '2022-07-10 17:20:54', 1, 120),
(26, '2022-07-10 19:20:20', 1, 125),
(27, '2022-07-13 19:47:30', 1, 123),
(28, '2022-07-13 23:02:49', 1, 142),
(29, '2022-07-13 23:04:29', 1, 142),
(30, '2022-07-13 23:53:54', 1, 121),
(31, '2022-07-13 23:53:59', 1, 122),
(32, '2022-07-13 23:54:03', 1, 122),
(33, '2022-07-13 23:54:08', 1, 131),
(34, '2022-07-13 23:56:05', 1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_konsultasi`
--

CREATE TABLE `tb_konsultasi` (
  `id_rule` int(11) NOT NULL,
  `kode` varchar(255) DEFAULT NULL,
  `jawaban` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_nilai`
--

CREATE TABLE `tb_nilai` (
  `id_nilai` int(11) NOT NULL,
  `id_atribut` varchar(255) DEFAULT NULL,
  `nama_nilai` varchar(255) DEFAULT NULL,
  `ket_nilai` varchar(255) DEFAULT NULL,
  `gambar_nilai` varchar(255) DEFAULT NULL,
  `penyebab` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_nilai`
--

INSERT INTO `tb_nilai` (`id_nilai`, `id_atribut`, `nama_nilai`, `ket_nilai`, `gambar_nilai`, `penyebab`) VALUES
(64, 'A01', 'iya', '', NULL, ''),
(65, 'A01', 'tidak', '', NULL, ''),
(66, 'A02', 'iya', '', NULL, ''),
(67, 'A02', 'tidak', '', NULL, ''),
(68, 'A03', 'tidak', '', NULL, ''),
(70, 'A03', 'iya', '', NULL, ''),
(71, 'A04', 'iya', '', NULL, ''),
(72, 'A04', 'tidak', '', NULL, ''),
(73, 'A05', 'iya', '', NULL, ''),
(74, 'A05', 'tidak', '', NULL, ''),
(75, 'A06', 'iya', '', NULL, ''),
(76, 'A06', 'tidak', '', NULL, ''),
(77, 'A07', 'iya', '', NULL, ''),
(78, 'A07', 'tidak', '', NULL, ''),
(79, 'A08', 'iya', '', NULL, ''),
(80, 'A08', 'tidak', '', NULL, ''),
(81, 'A09', 'iya', '', NULL, ''),
(82, 'A09', 'tidak', '', NULL, ''),
(83, 'A10', 'iya', '', NULL, ''),
(84, 'A10', 'tidak', '', NULL, ''),
(85, 'A11', 'iya', '', NULL, ''),
(86, 'A11', 'tidak', '', NULL, ''),
(87, 'A12', 'iya', '', NULL, ''),
(88, 'A12', 'tidak', '', NULL, ''),
(89, 'A13', 'iya', '', NULL, ''),
(90, 'A13', 'tidak', '', NULL, ''),
(91, 'A14', 'tidak', '', NULL, ''),
(92, 'A14', 'iya', '', NULL, ''),
(93, 'A15', 'iya', '', NULL, ''),
(94, 'A15', 'tidak', '', NULL, ''),
(95, 'A16', 'iya', '', NULL, ''),
(96, 'A16', 'tidak', '', NULL, ''),
(97, 'A17', 'iya', '', NULL, ''),
(98, 'A17', 'tidak', '', NULL, ''),
(99, 'A18', 'iya', '', NULL, ''),
(100, 'A18', 'tidak', '', NULL, ''),
(101, 'A19', 'iya', '', NULL, ''),
(103, 'A19', 'tidak', '', NULL, ''),
(104, 'A20', 'iya', '', NULL, ''),
(105, 'A20', 'tidak', '', NULL, ''),
(106, 'A21', 'tidak', '', NULL, ''),
(107, 'A21', 'iya', '', NULL, ''),
(108, 'A22', 'iya', '', NULL, ''),
(109, 'A22', 'tidak', '', NULL, ''),
(110, 'A23', 'iya', '', NULL, ''),
(111, 'A23', 'tidak', '', NULL, ''),
(112, 'A24', 'iya', '', NULL, ''),
(113, 'A24', 'tidak', '', NULL, ''),
(114, 'A25', 'iya', '', NULL, ''),
(115, 'A25', 'tidak', '', NULL, ''),
(116, 'A26', 'iya', '', NULL, ''),
(117, 'A26', 'tidak', '', NULL, ''),
(118, 'A27', 'iya', '', NULL, ''),
(119, 'A27', 'tidak', '', NULL, ''),
(120, 'A28', 'Baterai', 'Gunakan charger original, jangan gunakan hp pada saat proses charge.', '9171baterai-rusak.jpg', 'Menggunakan HP untuk telepon, bermain game, streaming, ketika dalam proses charge,'),
(121, 'A28', 'LCD', 'Cobalang mengkalibrasi touchscreen dan pastikan kondisi soket LCD baik, jika masih belum berhasil anda perlu mengganti LCD smartphone.', '8885small_5747lcd.jpg', 'Smartphone terjatuh, terbentur, tertekan atau karena terkena cairan, bisa juga karena kecacatan produk.'),
(122, 'A28', 'Kamera', 'Cobalah mengupdate sistem android atau update firmware, jangan lupa untuk membersihkan kamera.', '81718036kamera.jpg', 'Sistem android gagal update, kamera yang kotor, efek smartphone yang habis terbentur atau kemasukan air.'),
(123, 'A28', 'Microphone', 'bersihkan microphone, pastikan kondisi soket microphone baik.', '18022230microphone.png', 'microphone kotor dalam jangka waktu lama, soket kendor atau rusak.'),
(124, 'A28', 'Vibrator', 'Coba untuk reset ulang smartphone, jika smartphone anda dalam konsisi root coba untuk unroot, jika masih belum berhasil ganti hardware (vibrator).', '6924small_9582vibrator.jpg', 'Error sistem pada sistem operasi, dampak dari custom ROM.'),
(125, 'A28', 'Smartphone kemasukan Air', 'Jangan nyalakan handphone untuk sementara waktu, Lepaskan baterai, SIM card, dan memory card, Kering', '20481507kenaair.jpg', 'Smartphone tersiram, tenggelam oleh cairan.'),
(126, 'A28', 'IC Sinyal', 'ic sinyal rusak', NULL, ''),
(127, 'A28', 'Aplikasi', 'Cobalah untuk memperbarui WebView System Android.	', '5542small_9818aplikasi.jpg', 'Penyebab dari masalah error pada aplikasi Android ini adalah WebView System Android.	'),
(128, 'A28', 'Speaker', 'Pastikan kondisi speaker bersih, pastikan kondisi soket baik.', '21859407speaker.png', 'Selain terkena air, penyebab lain speaker bisa rusak adalah debu yang menumpuk.'),
(129, 'A28', 'Lupa Pola/Sandi', 'Cobalah mengunakan Android Device Manager atau factory reset.', '14918576lupapolasandi.jpg', 'Pengguna lupa pola/sandi.'),
(130, 'A28', 'Bootloop', 'mengalami bootloop', NULL, ''),
(131, 'A28', 'Overheat', 'Gunakanlah charger bawaan atau yang cocok dengan spesifikasi  baterai, cek kondisi baterai', '35046501overheat.jpg', 'Kondisi baterai buruk, tidak menggunakan charger bawaan, penggunaan smartphone pada saat proses charge.'),
(132, 'A28', 'IC Bluetooth', 'ic bluetooth rusak', NULL, ''),
(133, 'A28', 'Memory', 'Setel ulang smartphone ke pengaturan pabrik atau atur ulang melalui mode pemulihan.', '71321364memory.png', 'Ponsel terlalu lama mengalami memori penuh.'),
(134, 'A28', 'SIM Connector', 'Mengganti komponen yang mengalami kerusakan.', '83459049simkonektor.jpg', 'Patah karena terbentur atau SIM konektor mengalami aus.'),
(135, 'A28', 'Power ON Key', 'Colok Menggunakan Benda Lain. Alihkan fungsi tombol Power ke tombol Volume.', '35612784tombolpower.jpg', 'Smartphone terjatuh atau terbentur.'),
(136, 'A28', 'Software/UI', 'Kosongkan ruang, coba untuk mengupdate perangkat lunak, restart ulang pabrik, efek dari flashing.', '3388software.png', 'Bug developer, efek gagal rooting, smartphone terinfeksi virus.'),
(137, 'A28', 'IC Power', 'ic power rusak', NULL, ''),
(142, 'A28', 'TIdak Ditemukan', 'TIdak Ditemukan', '7390no_image.png', 'TIdak Ditemukan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rule`
--

CREATE TABLE `tb_rule` (
  `id_rule` int(11) NOT NULL,
  `kode` varchar(255) DEFAULT NULL,
  `jenis` varchar(16) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `child` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_rule`
--

INSERT INTO `tb_rule` (`id_rule`, `kode`, `jenis`, `parent`, `child`) VALUES
(1, 'LCD mati', 'tanya', 0, 'Ya'),
(2, 'Baterai lama terisi', 'tanya', 1, 'tidak'),
(3, 'Baterai', 'diagnosa', 2, 'iya'),
(4, 'Hasil kamera buram', 'tanya', 2, 'tidak'),
(5, 'Kamera', 'diagnosa', 4, 'iya'),
(6, 'Smartphone mengalami hang', 'tanya', 4, 'tidak'),
(7, 'Tidak dapat menangkap sinyal', 'tanya', 6, 'tidak'),
(8, 'Mic tidak dapat menangkap suara', 'tanya', 7, 'tidak'),
(9, 'Microphone', 'diagnosa', 8, 'iya'),
(10, 'Tidak dapat bergetar', 'tanya', 8, 'tidak'),
(11, 'Vibrator', 'diagnosa', 10, 'iya'),
(12, 'Tidak dapat di charge', 'tanya', 10, 'tidak'),
(13, 'IC Power', 'diagnosa', 12, 'iya'),
(14, 'Mengalami aplikasi restart', 'tanya', 12, 'tidak'),
(15, 'Speaker tidak dapat mengeluarkan suara', 'tanya', 14, 'tidak'),
(16, 'Speaker', 'diagnosa', 15, 'iya'),
(17, 'Anda lupa pola/sandi', 'tanya', 15, 'tidak'),
(18, 'Lupa Pola/Sandi', 'diagnosa', 17, 'iya'),
(19, 'Mengalami booting hanya sampai logo', 'tanya', 17, 'tidak'),
(20, 'Bootloop', 'diagnosa', 19, 'iya'),
(21, 'Bluetooth tidak dapat menyala', 'tanya', 19, 'tidak'),
(22, 'IC Bluetooth', 'diagnosa', 21, 'iya'),
(23, 'Tombol power rusak', 'tanya', 21, 'tidak'),
(24, 'Power ON Key', 'diagnosa', 23, 'iya'),
(25, 'TIdak Ditemukan', 'diagnosa', 23, 'tidak'),
(26, 'Memory', 'diagnosa', 14, 'iya'),
(27, 'Smartphone panas', 'tanya', 7, 'iya'),
(28, 'IC Sinyal', 'diagnosa', 27, 'iya'),
(29, 'SIM Connector', 'diagnosa', 27, 'tidak'),
(30, 'Smartphone panas', 'tanya', 6, 'iya'),
(31, 'Baterai Boros', 'tanya', 30, 'tidak'),
(32, 'Aplikasi', 'diagnosa', 31, 'tidak'),
(33, 'Software/UI', 'diagnosa', 31, 'iya'),
(34, 'Overheat', 'diagnosa', 30, 'iya'),
(35, 'Terdapat garis pada layar', 'tanya', 1, 'iya'),
(36, 'LCD', 'diagnosa', 35, 'iya'),
(37, 'Smartphone kemasukan Air', 'diagnosa', 35, 'tidak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `user` varchar(16) DEFAULT NULL,
  `pass` varchar(16) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `jk` varchar(255) DEFAULT NULL,
  `telpon` varchar(255) DEFAULT NULL,
  `level` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nama`, `email`, `user`, `pass`, `alamat`, `jk`, `telpon`, `level`) VALUES
(1, 'Administrator', 'admin@gmail.com', 'admin', 'admin', 'Alamat admin', 'Perempuan', '1234567890', 'admin'),
(4, 'habibi', 'habibimhz97@gmail.com', 'habibi', 'habibi', 'ciamis', 'Laki-laki', '1234567890', 'user'),
(6, 'asdasda', 'admin@ad.com', 'admin123', 'admin123', 'asdasd', 'Laki-laki', '234234', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_atribut`
--
ALTER TABLE `tb_atribut`
  ADD PRIMARY KEY (`id_atribut`);

--
-- Indeks untuk tabel `tb_dataset`
--
ALTER TABLE `tb_dataset`
  ADD PRIMARY KEY (`id_dataset`);

--
-- Indeks untuk tabel `tb_histori`
--
ALTER TABLE `tb_histori`
  ADD PRIMARY KEY (`id_histori`);

--
-- Indeks untuk tabel `tb_konsultasi`
--
ALTER TABLE `tb_konsultasi`
  ADD PRIMARY KEY (`id_rule`);

--
-- Indeks untuk tabel `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indeks untuk tabel `tb_rule`
--
ALTER TABLE `tb_rule`
  ADD PRIMARY KEY (`id_rule`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_dataset`
--
ALTER TABLE `tb_dataset`
  MODIFY `id_dataset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=920;

--
-- AUTO_INCREMENT untuk tabel `tb_histori`
--
ALTER TABLE `tb_histori`
  MODIFY `id_histori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `tb_konsultasi`
--
ALTER TABLE `tb_konsultasi`
  MODIFY `id_rule` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_nilai`
--
ALTER TABLE `tb_nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT untuk tabel `tb_rule`
--
ALTER TABLE `tb_rule`
  MODIFY `id_rule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
