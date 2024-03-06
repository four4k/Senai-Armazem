const data = [
  {
    title: "Notebook Dell XPS 13",
    description: 
      "Local: Sala de TI\nRack: A1\nPrateleira: 01\nPosição: 01"
  },
  {
    title: "Chave de Fenda Phillips",
    description: 
      "Local: Oficina\nEstante: Ferramentas\nPrateleira: 02\nPosição: 05"
  },
  {
    title: "Lâmpada LED Philips 9W",
    description: 
      "Local: Sala de Estoque\nEstante: Iluminação\nPrateleira: 03\nPosição: 02"
  },
  {
    title: "Impressora Multifuncional HP LaserJet Pro MFP M28w",
    description: 
      "Local: Escritório\nEstante: Impressoras\nPrateleira: 01\nPosição: 03"
  },
  {
    title: "Cadeira de Escritório Ergonômica",
    description: 
      "Local: Sala de Reuniões\nArmário: Móveis\nPrateleira: 01\nPosição: 02"
  },
  {
    title: "Fone de Ouvido Bluetooth JBL Tune 500BT",
    description: 
      "Local: Loja de Eletrônicos\nEstante: Acessórios de Áudio\nPrateleira: 02\nPosição: 07"
  },
  {
    title: "Mouse Gamer Logitech G502 Hero",
    description: 
      "Local: Quarto\nMesa: Gamer\nGaveta: 01\nPosição: 04"
  },
  {
    title: "Caixa de Ferramentas Stanley",
    description: 
      "Local: Garagem\nEstante: Ferramentas\nPrateleira: 01\nPosição: 01"
  },
  {
    title: "Cafeteira Elétrica Oster",
    description: 
      "Local: Cozinha\nArmário: Utensílios\nPrateleira: 02\nPosição: 03"
  },
  {
    title: "Câmera DSLR Canon EOS Rebel T7",
    description: 
      "Local: Estúdio Fotográfico\nPrateleira: Equipamentos de Fotografia\nPosição: 01"
  },
  {
    title: "Mochila SwissGear Travel Gear 1900",
    description: 
      "Local: Armário de Viagem\nPrateleira: Malas e Mochilas\nPosição: 03"
  },
  {
    title: "Fogão Electrolux 4 Bocas",
    description: 
      "Local: Cozinha\nArmário: Eletrodomésticos\nPrateleira: 01\nPosição: 02"
  },
  {
    title: "Livro 'O Senhor dos Anéis'",
    description: 
      "Local: Biblioteca\nEstante: Ficção Fantástica\nPrateleira: 03\nPosição: 05"
  },
  {
    title: "Regua de Medição de 30cm",
    description: 
      "Local: Laboratorio\nArmário: Ferramentas de Medição\nPrateleira: 01\nPosição: 01"
  },
  {
    title: "Monitor Dell Ultrasharp 27\"",
    description: 
      "Local: Escritório\nEstante: Monitores\nPrateleira: 02\nPosição: 01"
  },
  {
    title: "Cadeado de Segurança Yale",
    description: 
      "Local: Portaria\nArmário: Segurança\nPrateleira: 01\nPosição: 04"
  },
  {
    title: "GPS Garmin eTrex 30x",
    description: 
      "Local: Sala de Expedição\nArmário: Equipamentos de Navegação\nPrateleira: 02\nPosição: 03"
  },
  {
    title: "Teclado Mecânico Razer BlackWidow Elite",
    description: 
      "Local: Quarto\nMesa: Gamer\nGaveta: 01\nPosição: 02"
  },
  {
    title: "Smartphone iPhone 13 Pro Max",
    description: 
      "Local: Escritório\nEstante: Smartphones\nPrateleira: 01\nPosição: 01"
  },
  {
    title: "Micro-ondas Panasonic 32L",
    description: 
      "Local: Cozinha\nArmário: Eletrodomésticos\nPrateleira: 03\nPosição: 01"
  },
  {
    title: "Relógio de Parede Digital",
    description: 
      "Local: Sala de Reuniões\nEstante: Relógios\nPrateleira: 01\nPosição: 03"
  },
  {
    title: "Ferramenta Multiuso Leatherman Wave Plus",
    description: 
      "Local: Garagem\nEstante: Ferramentas\nPrateleira: 02\nPosição: 05"
  },
  {
    title: "Escova de Dentes Elétrica Oral-B Pro 3000",
    description: 
      "Local: Banheiro\nArmário: Higiene Pessoal\nPrateleira: 01\nPosição: 02"
  },
  {
    title: "Tênis Adidas Ultraboost",
    description: 
      "Local: Armário do Quarto\nPrateleira: Calçados\nPosição: 01"
  },
  {
    title: "Cadeira de Praia Nautika",
    description: 
      "Local: Garagem\nArmário: Lazer\nPrateleira: 01\nPosição: 01"
  },
  {
    title: "Panela de Pressão Tramontina 4.5L",
    description: 
      "Local: Cozinha\nArmário: Utensílios\nPrateleira: 01\nPosição: 04"
  },
  {
    title: "Fone de Ouvido Apple AirPods Pro",
    description: 
      "Local: Escritório\nEstante: Acessórios de Áudio\nPrateleira: 01\nPosição: 02"
  },
  {
    title: "Máquina de Lavar Brastemp 12kg",
    description: 
      "Local: Lavanderia\nArmário: Eletrodomésticos\nPrateleira: 01\nPosição: 01"
  },
];

const cardContainer = document.querySelector(".card-container");
const searchInput = document.querySelector("#searchInput");

const displayData = data => {
  cardContainer.innerHTML = "";
  data.forEach(element => { 
    cardContainer.innerHTML += `
    <div class="card">
      <h3>${element.title}</h3>
      <p>${element.description}</p>
    </div>
    `
  });
}

searchInput.addEventListener("keyup", (element) => {
  const search = data.filter(i => i.title.toLocaleLowerCase().includes(element.target.value.toLocaleLowerCase()));
  displayData(search);
});

// Adicionar um ouvinte de evento de clique para ativar a barra de pesquisa
searchInput.addEventListener("click", function() {
  // Adicionar a classe "active" à div de pesquisa quando clicar nela
  this.parentElement.classList.add("active");
});

// Adicionar um ouvinte de evento de clique ao documento inteiro
document.addEventListener("click", function(event) {
  // Verificar se o clique ocorreu fora da barra de pesquisa
  if (!event.target.closest('.search')) {
    // Remover a classe "active" da div de pesquisa
    document.querySelector('.search').classList.remove('active');
  }
});

window.addEventListener("load", displayData.bind(null, data));


