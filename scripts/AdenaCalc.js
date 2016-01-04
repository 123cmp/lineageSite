function AdenaCalc(moneyField, adenaField) {

    var self = this;

    const MONEY_TO_ADENA = 1,
          ADENA_TO_MONEY = 0;

    self.coefficients = [{
        value: 7,
        count: 1000
    }, {
        value: 8,
        count: 2000
    }, {
        value: 10,
        count: 5000
    }];

    self.chosenCoefficient = self.coefficients[0];

    moneyField.keyup(function() {
        calculateMoneyToAdena();
    });

    adenaField.keyup(function() {
        calculateAdenaToMoney();
    });

    function calculateMoneyToAdena() {
        var value = moneyField.val();
        var coefficientId = findCoefficient(value, MONEY_TO_ADENA);
        chooseCoefficient(coefficientId);
        calculate(MONEY_TO_ADENA);
    }

    function calculateAdenaToMoney() {
        var value = adenaField.val();
        var coefficientId = findCoefficient(value, ADENA_TO_MONEY);
        chooseCoefficient(coefficientId);
        calculate(ADENA_TO_MONEY);
    }

    function findCoefficient(value, direction) {
        var coefficientId = 0;
        var convertFunction = function(value) { return value };
        if(direction == MONEY_TO_ADENA)
            convertFunction = moneyToAdena;

        var coefficientsCount = self.coefficients.length,
            lastCoefficientId = coefficientsCount - 1,
            lastCoefficient = self.coefficients[lastCoefficientId],
            firstCoefficient = self.coefficients[0];

        if(convertFunction(value, firstCoefficient) < firstCoefficient.count)
            coefficientId = 0;
        else if(convertFunction(value, lastCoefficient) > lastCoefficient.count)
            coefficientId = self.coefficients.length - 1;
        else
            self.coefficients.forEach(function(coefficient, i) {
                if(convertFunction(value, coefficient) >= coefficient.count) {
                    coefficientId = i
                }
            });

        return coefficientId;
    }

    function setCoefficients(array) {
        if(!array || !array.length) return;
        self.coefficients = array;
        if(moneyField.val())
            calculateMoneyToAdena();
        else if(adenaField.val())
            calculateAdenaToMoney();

    }

    function chooseCoefficient(id) {
        self.chosenCoefficient = self.coefficients[id];
    }

    function moneyToAdena(money, coefficient) {
        money = number_unformat(money);
        if(!coefficient) coefficient  = self.chosenCoefficient;
        return money * coefficient.value;
    }

    function adenaToMoney(adena, coefficient) {
        adena = number_unformat(adena);
        if(!coefficient) coefficient  = self.chosenCoefficient;
        return adena / coefficient.value;
    }

    function calculate(direction) {
        console.info(
            "Direction: ", direction ? "money -> adena" : "adena -> money\n",
            "Coefficient: ", self.chosenCoefficient
        );

        if(direction) { // money -> adena
            adenaField.val(number_format(moneyToAdena(moneyField.val())));
        } else {        // adena -> money
            moneyField.val(number_format(adenaToMoney(adenaField.val())));
        }
    }

    return {
        setCoefficients: setCoefficients,
        chooseCoefficient: chooseCoefficient,
        calculate: calculate
    }
}
