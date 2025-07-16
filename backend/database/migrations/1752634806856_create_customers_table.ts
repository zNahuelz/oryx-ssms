import { BaseSchema } from '@adonisjs/lucid/schema'

export default class extends BaseSchema {
  protected tableName = 'customers'

  async up() {
    this.schema.createTable(this.tableName, (table) => {
      table.increments('id')
      table.string('names', 60).notNullable()
      table.string('surnames', 60).nullable()
      table.string('dni', 15).notNullable().unique()
      table.string('address', 150).nullable()
      table.string('phone_number', 20).nullable()
      table.string('email', 50).nullable()

      table.timestamp('created_at')
      table.timestamp('updated_at')
      table.timestamp('deleted_at').nullable()
    })
  }

  async down() {
    this.schema.dropTable(this.tableName)
  }
}
