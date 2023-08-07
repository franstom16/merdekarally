<div class="row">
    @foreach ($raceClass as $rc)
    <div class="col-lg-6">
        <div class="card table-responsive">
            <table id="assessment{{ $classCode }}Table" class="table table-striped">
                <thead>
                    <tr>
                        <th colspan="6">Team</th>
                    </tr>
                    <tr>
                        <th colspan="3">Team</th>
                        <th colspan="3">Individu</th>
                    </tr>
                    <tr>
                        <th>Rank</th>
                        <th>Team</th>
                        <th>Score</th>
                        <th>Rank</th>
                        <th>Participant</th>
                        <th>Score</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
</div>