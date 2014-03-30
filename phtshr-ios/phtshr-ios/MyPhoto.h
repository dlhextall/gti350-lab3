//
//  MyPhoto.h
//  phtshr-ios
//
//  Created by David Lafrance on 2014-03-28.
//  Copyright (c) 2014 David Lafrance. All rights reserved.
//

#import <UIKit/UIKit.h>

@interface MyPhoto : UIImage

@property (nonatomic) NSInteger photoId;
@property (nonatomic, strong) NSString *source;
@property (nonatomic, strong) NSString *description;

-(id)initWithId:(NSInteger)_photoId source:(NSString *)_source description:(NSString *)_description;

@end
