export const users = [
  {
    id: 1,
    name: 'Asur Bernardo',
  },
  {
    id: 2,
    name: 'David Gonzalez',
  },
  {
    id: 3,
    name: 'Javier Marti',
  },
];

export const propertyTypes = [
  {
    id: 1,
    name: 'home',
  },
  {
    id: 2,
    name: 'garage',
  },
  {
    id: 3,
    name: 'office',
  },
];

export const properties = [
  {
    id: 1,
    userId: 1,
    typeId: 1,
    name: 'Penthouse - General Peron 32',
    rentedFrom: new Date(2020, 1, 22),
    rentedTo: new Date(2020, 7, 7),
  },
  {
    id: 2,
    userId: 2,
    typeId: 1,
    name: 'Flat - Castellana 201',
    rentedFrom: null,
    rentedTo: null,
  },
  {
    id: 3,
    userId: 1,
    typeId: 2,
    name: 'Parking - Nuevos Ministerios',
    rentedFrom: new Date(2020, 3, 9),
    rentedTo: new Date(2020, 4, 7),
  },
  {
    id: 7,
    userId: 2,
    typeId: 2,
    name: 'Parking - Gran Via 56',
    rentedFrom: new Date(2021, 4, 21),
    rentedTo: null,
  },
  {
    id: 4,
    userId: 1,
    typeId: 3,
    name: 'Office - Ibiza Metro',
    rentedFrom: new Date(2020, 5, 22),
    rentedTo: null,
  },
  {
    id: 5,
    userId: 1,
    typeId: 3,
    name: 'Office - Plaza Castilla',
    rentedFrom: null,
    rentedTo: null,
  },
  {
    id: 6,
    userId: 2,
    typeId: 3,
    name: 'Office - Puente Segovia',
    rentedFrom: new Date(2021, 2, 2),
    rentedTo: null,
  },
];
