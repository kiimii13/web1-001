@props([
    'fecha',
    'valor',
])

<section>
    <h3>Valor de la UF</h3>

    <p>
        <strong>Fecha:</strong>
        {{ $fecha }}
    </p>

    <p>
        <strong>Valor:</strong>

        ${{ number_format(
            $valor,
            2,
            ',',
            '.'
        ) }}
    </p>
</section>
