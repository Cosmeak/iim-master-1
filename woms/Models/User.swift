//
//  User.swift
//  woms
//
//  Created by Guillaume FINE on 23/11/2023.
//

import Foundation


class User: Decodable, Encodable {
    let username: String
    let avatar_url: String?
    
    enum CodingKeys: String, CodingKey {
        case username
        case avatar_url
    }
}
