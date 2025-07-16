import { DateTime } from 'luxon'
import { BaseModel, belongsTo, column, hasMany } from '@adonisjs/lucid/orm'
import type { BelongsTo, HasMany } from '@adonisjs/lucid/types/relations'
import VoucherType from './voucher_type.js'
import PaymentType from './payment_type.js'
import VoucherDetail from './voucher_detail.js'

export default class Voucher extends BaseModel {
  @column({ isPrimary: true })
  declare id: number

  @column()
  declare subtotal: number

  @column()
  declare igv: number

  @column()
  declare tax: number

  @column()
  declare total: number

  @column()
  declare change: number

  @column()
  declare paid: boolean

  @column()
  declare set: string

  @column()
  declare correlative: string

  @column()
  declare paymentSerial: string | null

  @column()
  declare paymentImage: string | null

  @column.dateTime({ autoCreate: true })
  declare createdAt: DateTime

  @column.dateTime({ autoCreate: true, autoUpdate: true })
  declare updatedAt: DateTime

  @column.dateTime()
  declare deletedAt: DateTime | null

  @belongsTo(() => VoucherType)
  declare voucherType: BelongsTo<typeof VoucherType>

  @belongsTo(() => PaymentType)
  declare paymentType: BelongsTo<typeof PaymentType>

  @hasMany(() => VoucherDetail)
  declare voucherDetails: HasMany<typeof VoucherDetail>
}
