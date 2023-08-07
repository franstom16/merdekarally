<div class="row">
    @foreach ($raceClass as $rc)
    <div class="col-lg-6">
        <div class="card table-responsive">
            <table id="assessment{{ $rc->class_code }}Table" class="table table-striped">
                <thead>
                    <tr class="text-center text-uppercase">
                        <th colspan="6">{{ $rc->class_name }}</th>
                    </tr>
                    <tr class="text-center">
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
    @endforeach
</div>