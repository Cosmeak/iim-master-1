//
//  CreateBookView.swift
//  woms
//
//  Created by Guillaume FINE on 20/11/2023.
//

import SwiftUI

struct CreateBookView: View {
    @StateObject var viewModel = CreateBookViewModel()
    @Binding var isShowed: Bool
    @Binding var books: [Book]
    
    var body: some View {
        VStack(content: {
            Text("New books")
                .font(.system(size: 32))
                .padding()
            Form(content: {
                TextField("Title", text: $viewModel.title)
                TextField("Author", text: $viewModel.author)
                TextField("Cover", text: $viewModel.cover)
                DatePicker("Read Date", selection: $viewModel.readDate, in: Date()..., displayedComponents: .date)
                
                Button {
                    let book = viewModel.createNewBook()
                    books.append(book)
                    isShowed = false
                } label: {
                    Text("Save")
                }
                .padding(16)
                .background(Color.blue)
                .foregroundColor(.white)
                .cornerRadius(4)
            })
        })
    }
}

#Preview {
    CreateBookView(
        isShowed: Binding(get: {
            return true
        }, set: { _ in
            
        }),
        books: Binding(get: {
            return []
        }, set: { _ in
            
        })
    )
}
