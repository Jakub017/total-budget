@extends('layouts.app')
@section('title', "Planer budżetu")

@section('content')

<div class="container">
    <h1>Budżet miesięczny</h1>
    <div class="row">
        <div class="col-12 col-lg-6 mt-3">
            <h2>Wydatki</h2>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Typ wydatku</th>
                            <th scope="col">Przewidywana wartość</th>
                            <th scope="col">Realna wartość</th>
                            <th scope="col">Akcje</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($expenses as $expense)
                        <tr>
                            <td>{{ $expense->category }}</td>
                            <td>{{ $expense->planned_amount }} zł</td>
                            @if($expense->real_amount)
                            <td>{{ $expense->real_amount}} zł</td>
                            @else
                            <td></td>
                            @endif
                            <td>Edytuj, usuń</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <form action="{{route('planner.expense.store')}}" method="POST" class="form">
                @csrf
                <div class="new-expense d-flex d-none mb-3 gap-2">
                    <div class="col-12 col-md-6">
                        <input class="form-control" name="category" type="text" placeholder="Wprowadź typ wydatku..."
                            aria-label="Typ wydatku">
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="input-group">
                            <input class="form-control" name="planned_amount" type="text"
                                placeholder="Wprowadź wartość..." aria-label="Przewidywana kwota">
                            <span class="input-group-text">zł</span>
                        </div>
                    </div>

                </div>
                <button type="submit" class="btn btn-success save-expense d-none">Zapisz</button>
                <button class="btn btn-danger cancel-expense d-none">Anuluj</button>
                </tr>
            </form>
            <div class="d-flex mt-3">
                <button class="btn btn-primary add-expense">Dodaj wydatek</button>
            </div>
        </div>
        <div class="col-12 col-lg-6 mt-3">
            <h2>Wpływy</h2>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Typ wpływu</th>
                            <th scope="col">Przewidywana wartość</th>
                            <th scope="col">Realna wartość</th>
                            <th scope="col">Akcje</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($earnings as $earning)
                        <tr>
                            <td>{{ $earning->category }}</td>
                            <td>{{ $earning->planned_amount }} zł</td>
                            @if($earning->real_amount)
                            <td>{{ $earning->real_amount}} zł</td>
                            @else
                            <td></td>
                            @endif
                            <td>Edytuj, usuń</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <form action="{{route('planner.earning.store')}}" method="POST" class="form">
                @csrf
                <div class="new-earning d-flex d-none mb-3 gap-2">
                    <div class="col-12 col-md-6">
                        <input class="form-control" name="category" type="text" placeholder="Wprowadź typ wpływu..."
                            aria-label="Typ wpływu">
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="input-group">
                            <input class="form-control" name="planned_amount" type="text"
                                placeholder="Wprowadź wartość..." aria-label="Przewidywana kwota">
                            <span class="input-group-text">zł</span>
                        </div>
                    </div>

                </div>
                <button type="submit" class="btn btn-success save-earning d-none">Zapisz</button>
                <button class="btn btn-danger cancel-earning d-none">Anuluj</button>
                </tr>
            </form>
            <div class="d-flex mt-3">
                <button class="btn btn-primary add-earning">Dodaj wpływ</button>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    const addExpenseBtn = document.querySelector('.add-expense');
    const newExpenseRows = [...document.querySelectorAll('.new-expense')];
    const saveExpenseBtn = document.querySelector('.save-expense');
    const cancelExpenseBtn = document.querySelector('.cancel-expense');


    addExpenseBtn.addEventListener('click', () => {

        newExpenseRows.forEach(row => {
            row.classList.toggle('d-none');
        });
        addExpenseBtn.classList.toggle('d-none');
        saveExpenseBtn.classList.toggle('d-none');
        cancelExpenseBtn.classList.toggle('d-none');
    });

    cancelExpenseBtn.addEventListener('click', () => {
        newExpenseRows.forEach(row => {
            row.classList.toggle('d-none');
        });
        addExpenseBtn.classList.toggle('d-none');
        saveExpenseBtn.classList.toggle('d-none');
        cancelExpenseBtn.classList.toggle('d-none');
    });

    saveExpenseBtn.addEventListener('click', () => {
        newExpenseRows.forEach(row => {
            row.classList.toggle('d-none');
        });
        addExpenseBtn.classList.toggle('d-none');
        saveExpenseBtn.classList.toggle('d-none');
        cancelExpenseBtn.classList.toggle('d-none');
    });


    const addEarningBtn = document.querySelector('.add-earning');
    const newEarningRow = document.querySelector('.new-earning');
    const saveEarningBtn = document.querySelector('.save-earning');
    const cancelEarningBtn = document.querySelector('.cancel-earning');

    addEarningBtn.addEventListener('click', () => {
        addEarningBtn.classList.toggle('d-none');
        newEarningRow.classList.toggle('d-none');
        saveEarningBtn.classList.toggle('d-none');
        cancelEarningBtn.classList.toggle('d-none');
    })

    saveEarningBtn.addEventListener('click', () => {
        addEarningBtn.classList.toggle('d-none');
        newEarningRow.classList.toggle('d-none');
        saveEarningBtn.classList.toggle('d-none');
        cancelEarningBtn.classList.toggle('d-none');
    })

    cancelEarningBtn.addEventListener('click', () => {
        addEarningBtn.classList.toggle('d-none');
        newEarningRow.classList.toggle('d-none');
        saveEarningBtn.classList.toggle('d-none');
        cancelEarningBtn.classList.toggle('d-none');
    })

</script>
@endsection
