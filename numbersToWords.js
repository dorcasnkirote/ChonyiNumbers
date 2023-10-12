function main() {
    try {
      const number = convertNumbersToString(54); 
      console.log(number);
    } catch (e) {
      console.log(e.message);
    }
  }
  
  function convertNumbersToString(num) {
    if (num >= 1 && num <= 99) {
      return convertZeroToHundred(num);
    } else if (num >= 100 && num <= 999) {
      return convertHundredToThousand(num);
    } else {
      return "Number is out of bound";
    }
  }
  
  function convertHundredToThousand(num) {
    const tens = Math.floor(num / 10);
    const hundreds = Math.floor(num / 100);
    const modulus = num % 100;
    if (hundreds === 1) {
      if (modulus === 0) {
        return "gana";
      } else {
        return "igana na " + convertZeroToHundred(modulus);
      }
    } else {
      if (modulus === 0) {
        return "magana " + convertDoubleNumber(hundreds);
      } else if (tens == 0) {
          return "maghana" + convertDoubleNumber(hundreds)
      }
      else {
        return "magana " + convertDoubleNumber(hundreds) + " na " + convertZeroToHundred(modulus);
      }
    }
  }
  
  function convertZeroToHundred(num) {
    const hundreds = Math.floor(num / 100);
    const tens = Math.floor(num / 10);
    const ones = num % 10;
    if (tens === 0) {
      return convertSingleNumber(num);
    } else if (tens === 1) {
      if (ones === 0) {
        return "humi";
      } else {
        return "humi na " + convertSingleNumber(ones);
      }
    } else {
      if (ones === 0) {
        return multiplesOfTen(tens)
      } else {
        return convertDoubleNumber(hundreds) + multiplesOfTen(tens) + " na " + convertSingleNumber(ones);
      } 
    }
  }
  
  function convertSingleNumber(num) {
    const numbers = [
          "",
          "mwega",
          "mbiri",
          "tahu",
          "inne",
          "tsano",
          "andahu",
          "saba",
          "nane",
          "chenda"
    ];
    return numbers[num];
  }
  
  function multiplesOfTen(num) {
    const numbers = [
      "",
      "",
      "mirongo miri",
      "salasini",
      "arubaini",
      "mirongo mitsano",
      "mirongo mihandahu",
      "mirongo mifungahe",
      "samanini",
      "mirogo chenda"
    ];
    return numbers[num];
  }
  
  function convertDoubleNumber(num) {
    const numbers = [
      "",
      "",
      "mairi",
      "mahahu",
      "manne",
      "matsano",
      "sita",
      "saba",
      "manane",
      "chenda"
    ];
    return numbers[num];
  }
  
  main();