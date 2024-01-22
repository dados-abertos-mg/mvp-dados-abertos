<?php
class DespesaDTO
{
    public int $numExercicio;
    public string $numDespesa;
    public string $descDespesa;
    public string $numProjeto;
    public string $descProjeto;
    public float $vlEmpenhado;
    public float $vlLiquidado;
    public float $vlPago;
    public bool $covid;
    public bool $fundamentLegal;

    public function __construct(
        int $numExercicio,
        string $numDespesa,
        string $descDespesa,
        string $numProjeto,
        string $descProjeto,
        float $vlEmpenhado,
        float $vlLiquidado,
        float $vlPago,
        bool $covid,
        bool $fundamentLegal
    ) {
        $this->numExercicio = $numExercicio;
        $this->numDespesa = $numDespesa;
        $this->descDespesa = $descDespesa;
        $this->numProjeto = $numProjeto;
        $this->descProjeto = $descProjeto;
        $this->vlEmpenhado = $vlEmpenhado;
        $this->vlLiquidado = $vlLiquidado;
        $this->vlPago = $vlPago;
        $this->covid = $covid;
        $this->fundamentLegal = $fundamentLegal;

        $this->validarDados();
    }
    private function validarDados()
    {
        $this->validarNumeroExercicio();
        $this->validarStringMax($this->numDespesa, 50, "Número da despesa inválido ou muito longo.");
        $this->validarStringMax($this->descDespesa, 100, "Descrição da despesa inválida ou muito longa.");
        $this->validarStringMax($this->numProjeto, 50, "Número do projeto inválido ou muito longo.");
        $this->validarStringMax($this->descProjeto, 100, "Descrição do projeto inválida ou muito longa.");
        $this->validarValorNumerico($this->vlEmpenhado, "Valor empenhado inválido.");
        $this->validarValorNumerico($this->vlLiquidado, "Valor liquidado inválido.");
        $this->validarValorNumerico($this->vlPago, "Valor pago inválido.");
        $this->validarBooleano($this->covid, "O campo Covid deve ser booleano.");
        $this->validarBooleano($this->fundamentLegal, "O campo Fundamentação Legal deve ser booleano.");
    }

    private function validarNumeroExercicio()
    {
        if (!is_numeric($this->numExercicio) || strlen((string) $this->numExercicio) != 4) {
            throw new Exception("Número do exercício inválido.");
        }
    }

    private function validarStringMax($campo, $maximo, $mensagemErro)
    {
        if (!is_string($campo) || strlen($campo) > $maximo) {
            throw new Exception($mensagemErro);
        }
    }

    private function validarValorNumerico($valor, $mensagemErro)
    {
        if (!is_numeric($valor) || $valor < 0) {
            throw new Exception($mensagemErro);
        }
    }

    private function validarBooleano($valor, $mensagemErro)
    {
        if (!is_bool($valor)) {
            throw new Exception($mensagemErro);
        }
    }
}
