<?php
/* vim:set softtabstop=4 shiftwidth=4 expandtab: */
/**
 *
 * LICENSE: GNU Affero General Public License, version 3 (AGPLv3)
 * Copyright 2001 - 2019 Ampache.org
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

$user   = Core::get_global('user');
$filter = AmpConfig::get('catalog_filter');
$sql    = Catalog::get_uploads_sql('song', (int) $user->id);
$browse = new Browse();
$browse->set_type('song', $sql);
$browse->set_simple_browse(true);
if ($filter) {
    $browse->set_filter('catalog_filter', (string) $user->id);
}
$browse->show_objects();
$browse->store();

$sql    = Catalog::get_uploads_sql('album', (int) $user->id);
$browse = new Browse();
$browse->set_type('album', $sql);
$browse->set_simple_browse(true);
if ($filter) {
    $browse->set_filter('catalog_filter', (string) $user->id);
}
$browse->show_objects();
$browse->store();

if (!AmpConfig::get('upload_user_artist')) {
    $sql    = Catalog::get_uploads_sql('artist', (int) $user->id);
    $browse = new Browse();
    $browse->set_type('artist', $sql);
    $browse->set_simple_browse(true);
    if ($filter) {
        $browse->set_filter('catalog_filter', (string) $user->id);
    }
    $browse->show_objects();
    $browse->store();
}
