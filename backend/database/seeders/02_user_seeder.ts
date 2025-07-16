import Role from '#models/role'
import User from '#models/user'
import { BaseSeeder } from '@adonisjs/lucid/seeders'

export default class extends BaseSeeder {
  async run() {
    const admin = await Role.findByOrFail('name', 'ADMINISTRADOR')
    const seller = await Role.findByOrFail('name', 'VENDEDOR')
    await User.createMany([
      {
        names: 'Juan Vargas',
        surnames: '',
        dni: '01234567',
        address: 'Av. Estrella 777',
        email: 'admin@onyx.com',
        position: 'GERENTE',
        password: 'admin',
        profilePicture: '',
        roleId: admin.id,
      },
      {
        names: 'Hector',
        surnames: 'Suarez',
        dni: '09876543',
        address: 'Aija 4900',
        email: 'vendedor@onyx.com',
        position: 'TRABAJADOR',
        password: 'vendedor',
        profilePicture: '',
        roleId: seller.id,
      },
    ])
  }
}
