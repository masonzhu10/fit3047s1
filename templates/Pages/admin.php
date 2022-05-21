<?php
$this->layout = 'admin';
?>

<div class="dashboard">
    <a class="nav-link" href="/patients">
        <i class="fas fa-fw fa-table"></i>
        <span>Patients</span></a>
    <a class="nav-link" href="/patients/add">
        <i class="fas fa-fw fa-add"></i>
        <span>Add Patients</span></a>
    <a class="nav-link" href="/patients">
        <i class="fas fa-fw fa-table"></i>
        <span>Users</span></a>
    <a class="nav-link" href="/users/add">
        <i class="fas fa-fw fa-add"></i>
        <span>Add Users</span></a>

    <h3 style="margin: 20px auto; color: #3c3e43">Research Reference</h3>
    <table class="table d-flex justify-content-center">
        <tr>
            <th>Researcher</th>
            <th>Age Range (yrs)</th>
            <th>Maximum Weight (kg)</th>
            <th>AMaximum Height (cm)</th>
            <th>Medical History</th>
            <th>Comments</th>
        </tr>
        <tr>
            <td>Murdoch Children's Research Institute</th>
            <td>0-5</td>
            <td>18</td>
            <td>110</td>
            <td>All MECP2 relevant history accepted</td>
            <td>N/A</td>
        </tr>
        <tr>
            <td>Duncan Neurological Research Institute</th>
            <td>0-10</td>
            <td>32</td>
            <td>140</td>
            <td>All MECP2 relevant history accepted</td>
            <td>"Patients must submit records of any
                pre-existing health conditions unrelated
                to MECP2"
            </td>
        </tr>
        <tr>
            <td>The Brain and Mitochondrial Research Group</th>
            <td>5-10</td>
            <td>15</td>
            <td>100</td>
            <td>All MECP2 relevant history accepted</td>
            <td>N/A</td>
        </tr>
        <tr>
            <td>MECP2 Syndrome Research Trust</th>
            <td>9-14</td>
            <td>35</td>
            <td>70</td>
            <td>All MECP2 relevant history accepted</td>
            <td>"Accepts patients who are
                unsure about their
                diagnosis but show signs
                of MECP2 syndrome"
            </td>
        </tr>
        <tr>
            <td>Royal Children's Research Center</th>
            <td>15-20</td>
            <td>30</td>
            <td>70</td>
            <td>All MECP2 relevant history accepted</td>
            <td>N/A</td>
        </tr>
    </table>
</div>