<?php

?>
<div class="dropdown">
    <button class="btn border shadow-sm dropdown-toggle" style="padding: 6px;" onclick="showDropdown()" type="button" data-bs-toggle="dropdown" aria-expanded="false" id="dropdown-option">
        <span><i data-feather="settings" width="16" height="16"></i></span>
    </button>
    <ul class="dropdown-menu">
        
        <li><span class="dropdown-item hidecolumn" data-column="1">
            <input type="checkbox" id = "1"> <label for = "1">Id Pasien</label>
        </span></li>
        <li><span class="dropdown-item hidecolumn" data-column="2">
            <input type="checkbox" id = "2"> <label for = "2">Tanggal</label>
        </span></li>
        <li><span class="dropdown-item hidecolumn" data-column="3">
            <input type="checkbox" id = "3"> <label for = "3">Status</label>
        </span></li>    </ul>
</div>